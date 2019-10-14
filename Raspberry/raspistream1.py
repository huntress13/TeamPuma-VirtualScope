import os
import subprocess
import ftplib

#Connect to FTP server for file uploading
#ftp = ftplib.FTP()
#host = "ftp.site.site"
#port = 21
#ftp.connect(host, port)
#FTP.cwd(pathname)

#The interval between images HH:MM:SS
imageInterval = "00:03:00 "

#Youtube stream link
streamLink = "rtmp://a.rtmp.youtube.com/live2/0d18-twub-tqg7-3t7w"

#The concatonated command for streaming
streamCommand = "raspivid -o - -t 0 -fps 30 -b 6000000 | ffmpeg -re -f s16le -ac 2 -i /dev/zero -f h264 -i - -vcodec copy -g 50 -strict experimental -f flv -t " + imageInterval + streamLink

#Image number initialized to zero
imageNumber = 0

while True:
    subprocess.run(streamCommand, shell=True)
    picturePath = "pic" + str(imageNumber) + ".jpg"
    pictureCommand = "raspistill -o " + picturePath + " -w 640 -h 480"
    subprocess.call(pictureCommand, shell=True)
    i += 1
    #Send pic via ftp ??
    #file = open(picturePath,"rb")                  # file to send
    #ftp.storbinary("STOR " + picturePath, file)     # send the file
    #file.close()                                    # close file and FTP
    
