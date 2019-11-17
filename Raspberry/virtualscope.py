import sys
import os
import subprocess
import ftplib
import signal
from picamera import PiCamera
from time import sleep
import mysql.connector
from mysql.connector import Error
import datetime

#Define the microscope name !!IMPORTANT it comes from terminal argument
my_name = sys.argv[1]

#Establish the database connection
try:
  connection = mysql.connector.connect(host='50.87.144.72',
                     database='teampuma_virtualscope',
                     user='teampuma_ryan',
                     password='ICS499')

  if connection.is_connected():
    #Select the time increment from the microscopes table
    cursor = connection.cursor()
    select_stmt = "SELECT picture_time_increment, youtube FROM microscopes WHERE microscope_name = %(microscope_name)s"
    cursor.execute(select_stmt, { 'microscope_name': my_name })
    info = cursor.fetchone()
    time_increment = info[0]
    stream_link = info[1]

#Error connecting -> Use default time_increment
except Error as e:
  print("Error while connecting to MySQL", e)
  time_increment = 3
  
#Close the database connection
finally:
  if (connection.is_connected()):
    cursor.close()
    connection.close()

#Connect to FTP server for file uploading
ftp = ftplib.FTP()
host = "ftp.virtualscope.site"
port = 21
ftp.connect(host, port)
ftp.login("teampuma","1#%ekd%YlaG*")
ftp.cwd("public_html/microscopes/" + my_name + "/images/")

#The concatonated command for streaming
stream_command = "raspivid -o - -t 0 -w 1280 -h 720 -fps 30 -b 6000000 | ffmpeg -re -f s16le -ac 2 -i /dev/zero -f h264 -i - -vcodec copy -g 50 -strict experimental -f flv " + stream_link

#Picture folder where photos are saved on the Pi
pic_folder = "/home/pi/MicroscopeImages/"

while True:
  #Run stream for designated time interval
  pro = subprocess.Popen(stream_command, stdout=subprocess.PIPE, shell=True, preexec_fn=os.setsid) 

  sleep((time_increment * 60)+3)
  os.killpg(os.getpgid(pro.pid), signal.SIGTERM)
  
  #Define picture path and capture photo
  now = datetime.datetime.now() #Get timestamp
  picture_name = now.strftime("date_%m-%d-%Y_time_%H-%M-%S.jpg") #format image name
  picture_path = pic_folder + picture_name
  camera = PiCamera()
  sleep(0.75)
  camera.capture(picture_path, resize=(1230, 924)) #take pictue and resize
  camera.close()
  
  #Send pic via ftp
  file = open(picture_path,"rb")                  # file to send
  ftp.storbinary("STOR " + picture_name, file)     # send the file
  file.close()  
