import socket

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

def dataTransfer(conn):
    #Send/receive data
    while True:
        #Receive
        data = conn.recv(1024) #Buffer size
        data = data.decode('utf-8')
        dataMessage = data.split(' ',1)
        command = dataMessage[0]
        if command == 'GET':
            reply = GET()
            print(reply)
        elif command == 'REPEAT':
            reply = REPEAT(dataMessage)
            print(reply)
        elif command == 'EXIT':
            print("Client left")
            break
        elif command == 'KILL':
            print("Connection closed")
            s.close()
        else:
            reply = 'Unknown'
        #Send
        conn.sendall(str.encode(reply))
        print("Data sent")
        
    conn.close()

s = setupServer()

while True:
    try:
        conn = setupConnection()
        dataTransfer(conn)
    except:
        break
