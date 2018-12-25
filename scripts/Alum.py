import sqlalchemy.dialects.mysql, urllib.request, urllib.parse, urllib.error, ssl
from bs4 import BeautifulSoup

#SSL certificates
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

url = 'http://lahann.engin.umich.edu/people'
url = urllib.request.urlopen(url,context=ctx)
data = url.read()

soup = BeautifulSoup(data, 'html.parser')
tabs = soup('tr')
exp = 9
prin = False;
for tab in tabs:
	td = tab('td')
	try:
		photo = td[0].string.split()
		photo = photo[0]+photo[1]+".jpg"
		photo = photo.strip()
	except:
		continue

	#These things aren't Names
	values = {"Name", "Email Address", "Department", "Graduate Mentor", "Years in Lahann Lab", "Lahann Lab Years", "Post Lahann Lab Location", "Post Lahann Lab Position", "Lahann Lab", "Years", "JP-Morgan Chase", "Multidisciplinary Design Program Student"}
	if td[0].string.strip() in values:
		continue

	#Deals with who to grab, and what level they are
	if td[0].string.strip() == "Kenneth Cheng":
		prin = True
	if td[0].string.strip() == "Nathan Jones" or td[0].string == "Chris Yu" or td[0].string == "Divya Varadharajan" or td[0].string == "Zixing Fan":
		exp = exp - 1

	#Gets stuff thats only on people's page (uses element.previous_sibling().previous_sibling to find the key)
	email = td[0].a

	personal = dict()
	if email is not None:
		#Opens the personal Page
		try:
			email = urllib.request.urlopen(email.get('href'),context=ctx)
			email = BeautifulSoup(email, 'html.parser')
		except:
			continue

		#Lines up each users information with the appropriate field
		#for em in email.next_siblings:
			#print(em.string)
			#try:
				#prev = em.next_sibling.string
				#print(prev, td[0].string, em.string)
				#stri = "\"" + em.string + "\""
				#if prev == "Contact" :
				#	personal["email"] = stri

				#if prev == "Education":
				#	personal["education"] = stri

				#if prev == "Research":
				#	personal["research"] = stri

				#if prev == "Experience":
				#	personal["research_exp"] = stri

				#if prev == "Awards":
				#	personal["awards"] = stri
			#except:
			#	print("LOL", td[0].string, em.string)
			#	pass

	#Prints out the sql statement
	if prin == True:
		try:
			Loc = td[2].string + " " + td[3].string
		except:
			Loc = "NULL"
		print("INSERT INTO `person`(`name`, `experience`, `power`, `email`, `department`, `location`, `years`, `mentor`, `photo`, `resum`, `Education`, `Research`, `Research_Experience`, `Awards`) VALUES(\"",td[0].string,"\",",exp,",0,", personal.get("email", "NULL"), ",", personal.get("department", "null"), ",\"", Loc, "\",\"", td[1].string, "\",", "NULL", ",\"", photo, "\",", "NULL", ",", personal.get("education", "NULL"), ",", personal.get("research", "NULL"), ",", personal.get("research_exp","NULL"), ",", personal.get("awards", "NULL"),"); \n")
