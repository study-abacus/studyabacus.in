from flask import (
        Flask,
        render_template,
        send_from_directory,
        abort
)
from decouple import config
import json

app = Flask(__name__, static_url_path='')
COURSES = json.load(open('courses.json'))


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
    return render_template('centers.html')

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
