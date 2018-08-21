import socket

host = '192.168.31.74' #IP of Raspberry
port = 5560

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((host, port))

while True:
    """command = input("Enter command: ")
    if command == 'EXIT':
        s.send(str.encode(command))
        break
    elif command == 'KILL':
        s.send(str.encode(command))
        break;
    s.send(str.encode(command))
    reply = s.recv(1024) #Buffer size
    print(reply.decode('utf-8'))"""

s.close()
