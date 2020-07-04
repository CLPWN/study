import pathlib
from ftplib import FTP


ftp = FTP(
    "10.10.10.5",
    "anonymous",
    passwd=""
)

fnames = open("filename.list","r")
fn = fnames.readlines()
plist = open("password.list","r")
pwd = plist.readlines()

for i in range(12):
	pf = pathlib.Path(fn[i].rstrip('\n') +".txt")
	pf.touch()
	wf = open(fn[i].rstrip('\n')+".txt","w")
	wf.write(pwd[i])
	wf.close()
	uf = open(fn[i].rstrip('\n')+".txt", "rb")
        ftp.storlines("STOR "+fn[i].rstrip('\n')+".txt", uf)
	
 
ff = open("../flag1-1/flag.zip", "rb")
ftp.storbinary("STOR flag.zip", ff)

for i in range(12,35):
	pf = pathlib.Path(fn[i].rstrip('\n') +".txt")
	pf.touch()
	wf = open(fn[i].rstrip('\n')+".txt","w")
	wf.write(pwd[i])
	wf.close()
	uf = open(fn[i].rstrip('\n')+".txt", "rb")
        ftp.storlines("STOR "+fn[i].rstrip('\n')+".txt", uf)

ff = open("../flag2-1/flag.zip", "rb")
ftp.storbinary("STOR flag.zip", ff)


for i in range(35,50):
	pf = pathlib.Path(fn[i].rstrip('\n') +".txt")
	pf.touch()
	wf = open(fn[i].rstrip('\n')+".txt","w")
	wf.write(pwd[i])
	wf.close()
	uf = open(fn[i].rstrip('\n')+".txt", "rb")
        ftp.storlines("STOR "+fn[i].rstrip('\n')+".txt", uf)


ff = open("../flag3-1/flag.zip", "rb")
ftp.storbinary("STOR flag.zip", ff)

