from decouple import config
import json
import requests
from flask import (
        Flask,
        render_template,
        send_from_directory,
        abort
)

app = Flask(__name__, static_url_path='')
COURSES = json.load(open('data/courses.json'))


@app.context_processor
def inject_courses():
    return { "courses": COURSES }


@app.route('/course/<slug>')
def course(slug):
    try:
        course = filter(lambda obj: obj['slug'] == slug, COURSES).__next__()
        return render_template(course['template_name'])
    except StopIteration:
        abort(404)

@app.route('/centres')
def centres():
    url = "http://admin.studyabacus.in/api/centres/"
    headers = {
        "Authorization": "Token aecb8f49082758f41885dc00a37db0b6afd57162"
    }
    response = requests.get(url, headers = headers)
    centre_list = []
    if response.status_code == 200:
        centre_list = json.loads(response.content)
    return render_template('centers.html', centres = centre_list)

@app.route('/career')
def career():
    return render_template('careers.html')

@app.route('/faq')
def faq():
    return render_template('faq.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

@app.route('/')
def index():
    return render_template('index.html')


if __name__ == "__main__":
    app.run(
        port = config('PORT', default=8000, cast=int),
        debug = config('DEBUG', default=True, cast=bool)
    )
