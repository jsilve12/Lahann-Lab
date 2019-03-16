import sys,os,random, time

people = ["Joerg Lahann", "Stephanie Christau", "Ramya Kumar", "Jason Gregory", "Nahal Habibi", "Dylan Neale", "Daniel Quevedo", "Ayse Muniz", "Jonathan Gerszberg"]
year = os.popen("date +'%Y'").read()

# File
os.popen("rm papers.txt")
os.popen("touch papers.txt")
f = open("papers.txt", "a")


for person in people:
	cmd = "python3 Papers.py -d -c 10 --author \""+person+"\" --after " + str(int(year) - 10)
	print(cmd)
	returned = os.popen(cmd).read()
	f.write(str(returned))
	time.sleep(random.randint(20, 40))

f.close()
