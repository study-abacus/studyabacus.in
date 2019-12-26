import requests
from decouple import config

class ChampionshipService:
    def __init__(self, API_KEY, API_HOST):
        self.API_KEY = API_KEY
        self.API_HOST = API_HOST

    def getResult(self, roll_number):
        return requests.post(
            self.API_HOST,
            data = {
                "key": self.API_KEY,
                "roll_number": roll_number
            }
        )

service = ChampionshipService(
    config('CHAMPIONSHIP_API_KEY'),
    config('CHAMPIONSHIP_API_HOST')
)

