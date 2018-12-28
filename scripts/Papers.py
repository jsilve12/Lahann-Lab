import sqlalchemy.dialects.mysql, urllib.request, urllib.parse, urllib.error, ssl
from bs4 import BeautifulSoup

#SSL certificates
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

people = ["Joerg Lahann", "Stephanie Christau", "Ramya Kumar", "Jason Gregory", "Nahal Habibi", "Dylan Neale", "Daniel Quevedo", "Ayse Muniz", "Jonathan Gerszberg"]
for person in people:
	p = person.split()
	url = 'https://scholar.google.com/scholar?hl=en&as_sdt=0,14&q="'+p[0]+"+"+p[1]+'"&scisbd=1'
