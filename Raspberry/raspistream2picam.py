import os
import subprocess
import ftplib
from picamera import PiCamera
from time import sleep

#Connect to FTP server for file uploading
ftp = ftplib.FTP()
host = "ftp.virtualscope.site"
port = 21
ftp.connect(host, port)
ftp.login("teampuma","OURPASSWORD")
ftp.cwd("public_html/images/microscope1/")

#The interval between images HH:MM:SS
imageInterval = "00:01:00 "

#Youtube stream link
streamLink = "rtmp://a.rtmp.youtube.com/live2/0d18-twub-tqg7-3t7w"

#The concatonated command for streaming
streamCommand = "raspivid -o - -t 0 -w 1280 -h 720 -fps 30 -b 6000000 | ffmpeg -re -f s16le -ac 2 -i /dev/zero -f h264 -i - -vcodec copy -g 50 -strict experimental -f flv -t " + imageInterval + streamLink

#Image number initialized to zero
imageNumber = 0

#Picture Folder
picFolder = "/home/pi/MicroscopeImages/"

while True:
    #Run stream for designated time interval
    subprocess.call(streamCommand, shell=True)
    #Define picture path and capture photo
    pictureName = "pic" + str(imageNumber) + ".jpg"
    picturePath = picFolder + pictureName
    camera = PiCamera()
    sleep(0.5)
    camera.capture(picturePath)
    camera.close()
    #Send pic via ftp
    file = open(picturePath,"rb")                  # file to send
    ftp.storbinary("STOR " + pictureName, file)     # send the file
    file.close()                                    # close file and FTP
    imageNumber += 1
