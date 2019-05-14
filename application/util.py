def get_route_string(s):
  if s == 'index': return '/'
  return '/' + s.replace('_','/').replace('0', ':')
