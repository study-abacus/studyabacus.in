import json

class Preprocessor:
  def __init__(self, app):
    self.app = app
    list(map(
      lambda func: app.context_processor(func), 
      [self.inject_courses]
    ))

  def inject_courses(self):
    COURSES = json.load(open('data/courses.json'))
    return { "courses": COURSES }
