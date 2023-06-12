from src.injector_state.sql_injector_state import SQLInjectorState
from src.injector_state.sql_injector_database_names import SQLInjectorGetDatabaseNames
import logging

class SQLInjectorGetVersionState(SQLInjectorState):
    def __init__(self, sql_injector) -> None:
        super().__init__(sql_injector)

    def isEnd(self):
        return True

    def next(self):
        self.sql_injector.state = SQLInjectorGetDatabaseNames()

    def inject(self, action, input_chosen, inputs):
        super().injection(action, input_chosen, inputs, "sql_injection_string")