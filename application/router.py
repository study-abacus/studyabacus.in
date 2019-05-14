import requests
import json
from application import util
from decouple import config
from flask import (
        render_template,
        send_from_directory,
        abort
)

API_KEY = config('API_KEY', default='')
COURSES = json.load(open('data/courses.json'))

class Router:
    def __init__(self, app):
        # decorate all the methods
        routes = [
            {
                'url': '/course/<slug>',
                'method': self.course,
                'kwargs': {}
            },
            {
                'url': '/centres',
                'method': self.centres,
                'kwargs': {}
            },
            {
                'url': '/career',
                'method': self.career,
                'kwargs': {}
            },
            {
                'url': '/faq',
                'method': self.faq,
                'kwargs': {}
            },
            {
                'url': '/contact',
                'method': self.contact,
                'kwargs': {}
            },
            {
                'url': '/',
                'method': self.index,
                'kwargs': {}
            }
        ]
        list(map(
            lambda obj: app.route(
                obj['url'],
                **obj['kwargs']
            )(obj['method']), 
            routes
        ))

    @staticmethod
    def course(slug):
        try:
            course = next(filter(lambda obj: obj['slug'] == slug, COURSES))
            return render_template(course['template_name'])
        except StopIteration:
            abort(404)

    @staticmethod
    def centres():
        url = "https://admin.studyabacus.com/api/centres/"
        headers = {
            "Authorization": "Token {}".format(API_KEY)
        }
        response = requests.get(url, headers = headers)
        centre_list = []
        if response.status_code == 200:
            centre_list = json.loads(response.content)
        return render_template('centers.html', centres = centre_list)

    @staticmethod
    def career():
        return render_template('careers.html')

    @staticmethod
    def faq():
        return render_template('faq.html')

    @staticmethod
    def contact():
        return render_template('contact.html')

    @staticmethod
    def index():
        return render_template('index.html')

    