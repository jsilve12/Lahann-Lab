from bs4 import BeautifulSoup
import urllib.request, urllib.parse, urllib.error, ssl, random

#SSL certificates
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

# Gets all the news URL
url = 'http://lahann.engin.umich.edu/news'
newsLinks = []
for i in range(0, 9):
	offset = '?offset='+str(i*10)
	tempUrl = url + offset

	# Opens and works the urls
	dat = urllib.request.urlopen(tempUrl, context=ctx)
	data = dat.read()
	soup = BeautifulSoup(data, 'html.parser')
	articleLinks = soup.find_all('h4')
	for links in articleLinks:
		for link in links.find_all("a"):
			newsLinks.append("http://lahann.engin.umich.edu"+link.get('href'))

# Gets the articles from all the URLS
articleSave = []
for articles in newsLinks:
	#Opens the URL
	art = urllib.request.urlopen(articles, context=ctx)
	article = art.read()
	soup = BeautifulSoup(article, 'html.parser')
	article = {}
	article["text"] = "\n"

	#Gets the articles text and the any images
	texts = soup.find_all('font')
	textCont = ""
	images = []

	# Gets the title
	title = soup.find("span", {"id":"sites-page-title"})
	article["title"] = title.contents[0]

	# Gets the time TODO: make the time fite into time type
	time = soup.find("span", {"xmlns":"http://www.w3.org/1999/xhtml"})
	article["time"] = time.contents[0]

	# Gets the poster
	post = soup.find("span", {"id":"afterPageTitleHideDuringEdit"})
	article["poster"] = (post.contents[4]).strip()

	# Gets the text
	for text in texts:
		for cont in text.contents:
			if "All rights reserved" not in cont and "<br/>" not in cont:
				textCont = textCont + str(cont) + "\n"
	article["text"] = textCont

	# Gets the images
	images = soup.find_all('img')
	article["images"] = []
	for image in images:
		#Ignore the "M"
		if image['src'] == "/_/rsrc/1547123785084/config/customLogo.gif?revision=19":
			pass
		else:
			# Sometimes the image is 404 not found
			ending = ".jpg"
			if(".pn" in image['src']):
				ending = ".png"
			elif(".gi" in image['src']):
				ending = ".gif"
			try:
				imgUrl = "images/" + str(random.randint(1, 100000000)) + ending
				urllib.request.urlretrieve(image['src'], imgUrl)
				article["images"].append(imgUrl)
			except:
				pass

	articleSave.append(article)
# Initializes the database
print('''
Create Table news(
	pk integer auto_increment not null,
	title varchar(256),
	dat date,
	author varchar(64),
	contents varchar(4096),
	primary key (pk)
) engine = innoDB;
Create Table images(
	pk integer auto_increment not null,
	art integer,
	name varchar(256),
	primary key(pk),
	constraint fk_article
		foreign key (art)
		references news(pk)
) engine = innoDB;
''')
for i in range(len(articleSave)):
	# The sql stuff
	print("Insert Into news(title, dat, author, contents) values(\"" + articleSave[i]["title"].replace("\"", "\\\"") + "\",\"" + articleSave[i]["time"].replace("\"", "\\\"") + "\",\"" + articleSave[i]["poster"].replace("\"", "\\\"") + "\",\"" + articleSave[i]["text"].replace("\"", "\\\"") + "\");")
	for j in articleSave[i]["images"]:
		print("Insert Into images(art, name) values(" + str(i+1) + ",\"" + str(j) + "\");")
