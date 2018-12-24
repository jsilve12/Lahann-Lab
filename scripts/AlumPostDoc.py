import MySQLdb, urllib.request, urllib.parse, urllib.error, ssl
from bs4 import BeautifulSoup

#SSL certificates
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

url = 'http://lahann.engin.umich.edu/people'
url = urllib.request.urlopen(url,context=ctx)
data = url.read()

soup = BeautifulSoup(html, 'html.parser')
tab = soup('table')
print(tab)
