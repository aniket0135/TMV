import socket
import datetime
import threading
import RPi.GPIO as GPIO
import time
import requests


host = ''
port = 5560

storedValue='YO B'

def setupServer():
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    print("Socket created")
    try:
        s.bind((host,port))
    except socket.error as msg:
        print(msg)
    print("Socket bind complete")
    return s

def setupConnection():
    s.listen(1) #Allow only 1 connection
    conn, address = s.accept()
    print("Connected to "+address[0]+":"+str(address[1]))
    return conn

def GET():
    reply = storedValue
    return reply

def REPEAT(dataMessage):
    reply = dataMessage[1]
    return reply

def readSensor():
    #h,t = dht.read_retry(dht.DHT22,20)
    #print(t)
    t=30.5
    h=45.7
    now = datetime.datetime.now().time()
    temp = "%.1f" %t
    hum = "%.1f" %h
    print(temp)
    print(hum)
    payload = {"temp": temp, "hum": hum}
    r = requests.get("http://192.168.31.142/TMV-master/savetemphum.php", params=payload)
    #print(r.url)
    print(r.status_code)

def dataTransfer(conn):
    #Send/receive data
    while True:
        #Receive
        readSensor()
        #Send
        print("Data sent")

    conn.close()


s = setupServer()

while True:
    try:
        conn = setupConnection()
        dataTransfer(conn)
    except:
        break
