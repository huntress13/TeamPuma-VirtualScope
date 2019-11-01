import os
import subprocess
import ftplib
from picamera import PiCamera
from time import sleep
import mysql.connector
from mysql.connector import Error

#Define the microscope name
myName = 'microscope1'

#Establish the database connection
try:
  connection = mysql.connector.connect(host='50.87.144.72',
                     database='teampuma_virtualscope',
                     user='teampuma_ryan',
                     password='ICS499')

  if connection.is_connected():
    #Select the time increment from the microscopes table
    cursor = connection.cursor()
    select_stmt = "SELECT picture_time_increment FROM microscopes WHERE microscope_name = %(microscope_name)s"
    cursor.execute(select_stmt, { 'microscope_name': myName })
    time_increment = cursor.fetchone()[0]
    print("The time increment is:", time_increment)

#Error connecting -> Use default time_increment
except Error as e:
  print("Error while connecting to MySQL", e)
  time_increment = 5
  
#Close the database connection
finally:
  if (connection.is_connected()):
    cursor.close()
    connection.close()
    print("MySQL connection is closed")

#Connect to FTP server for file uploading
ftp = ftplib.FTP()
host = "ftp.virtualscope.site"
port = 21
ftp.connect(host, port)
ftp.login("teampuma","OURPASSWORD")
ftp.cwd("public_html/images/microscope1/")

# !!!!!! This should use timedelta str format!!!!
#The interval between images HH:MM:SS
#The SPACE at the end is important!
if(time_increment < 10):
  imageInterval = "00:0"+time_increment+":00 "
else:
  imageInterval = "00:"+time_increment+":00 "

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
