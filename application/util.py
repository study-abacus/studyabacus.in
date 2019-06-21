import requests
from decouple import config

def get_route_string(s):
  if s == 'index': return '/'
  return '/' + s.replace('_','/').replace('0', ':')

def api(url, params = {}, method = 'get'):
  API_KEY = config('API_KEY', default='')
  headers = {
    "Authorization": "Token {}".format(API_KEY)
  }
  if method == 'get':
    return requests.get(
      url, 
      headers = headers, 
      params = params
    )
  elif method == 'post':
    return requests.post(
      url,
      headers = headers,
      data = params
    )
  else:
    raise Exception('Method not supported')