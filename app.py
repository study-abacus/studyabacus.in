from application.router import Router
from application.preprocessor import Preprocessor
from flask_wtf.csrf import CSRFProtect
from decouple import config
from flask import Flask

app = Flask(__name__, static_url_path='')
app.secret_key = config('SECRET_KEY')

Router(app)
Preprocessor(app)
CSRFProtect(app)

if __name__ == "__main__":
    app.run(
        port = config('PORT', default=8080, cast=int),
        debug = config('DEBUG', default=True, cast=bool)
    )
