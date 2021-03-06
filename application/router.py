import json
from application import util
from decouple import config
from application.services import championship
from flask import (
    request,
    render_template,
    send_from_directory,
    redirect,
    abort
)

COURSES = json.load(open('data/courses.json'))
REVIEWS = json.load(open('data/reviews.json'))

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
                'url': '/exam/<slug>',
                'method': self.exam,
                'kwargs': {}
            },
            {
                'url': '/learning_online',
                'method': self.learning_online,
                'kwargs': {}
            },
            {
                'url': '/payonline',
                'method': self.pay_online,
                'kwargs': {}
            },
            {
                'url': '/contact',
                'method': self.contact,
                'kwargs': {
                    'methods': ['GET', 'POST']
                }
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
        response = util.api("/api/centres/")
        centre_list = []
        if response.status_code == 200:
            centre_list = json.loads(response.content.decode('utf-8'))
        return render_template('centers.html', centres = centre_list)

    @staticmethod
    def career():
        return render_template('careers.html')

    @staticmethod
    def faq():
        return render_template('faq.html')

    @staticmethod
    def exam(slug):
        response = util.api('/api/exams/{}'.format(slug))
        exam = json.loads(response.content.decode('utf-8'))
        return render_template('exam.html', exam = exam)

    @staticmethod
    def learning_online():
        return redirect('https://www.youtube.com/channel/UCX4efrIZvf7grkx4pCEW3dQ', code = 301)
    
    @staticmethod
    def pay_online():
        return render_template('payonline.html')

    @staticmethod
    def contact():
        resp = None
        if request.method == 'POST':
            resp = util.api(
                '/api/contact_query/',
                params = {
                    'name': request.form['name'],
                    'email': request.form['email'],
                    'phone_number': request.form['phone_number'],
                    'message': request.form['message']
                },
                method = 'post'
            )
        return render_template('contact.html', resp = resp)

    @staticmethod
    def index():
        return render_template('index.html', reviews = REVIEWS)

    
