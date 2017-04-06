
from win.appmon import AppMon
import psutil
import os
import subprocess
import ctypes

import logging
from socketIO_client import SocketIO, LoggingNamespace

proc = subprocess.Popen("py -m http.server 8000", shell=True, stdout=subprocess.PIPE)


appmon = AppMon()

file = open("client.cfg", "r") 
clientid = file.read() 

print("Starting npd... @ " + clientid)

#logging.getLogger('socketIO-client').setLevel(logging.DEBUG)
#logging.basicConfig()


    #socketIO.emit('bbb', {'xxx': 'yyy'}, on_bbb_response)
    #socketIO.wait_for_callbacks(seconds=1)


def on_connect():
    print('connect')
    socketIO.emit('ident', clientid)

def on_disconnect():
    print('disconnect')

def on_reconnect():
    print('reconnect')
    socketIO.emit('ident', clientid)

def send_system_status(*args):
    print("Sending Client info...")
    
def show_alert(data):
    args = data.split(",")
    if clientid == args[0]:
        ctypes.windll.user32.MessageBoxW(None, args[1], 'Message from administrator', 0)
        

def kill_process(data):
    args = data.split(",")
    print("KILLING pid " + args[0] + "for " + args[1]) 
    #p = psutil.Process(int(pid))
    #p.terminate()
    #os.system("taskkill /pid " + pid + " /f")
    if clientid == args[1]:
        proc = subprocess.Popen("taskkill /pid " + args[0] + " /f", shell=True, stdout=subprocess.PIPE)
        
def spawn_process(process):
    args = process.split(",")
    print("Spawning process " + args[0] + " for " + args[1]) 
    if clientid == args[1]:
        proc = subprocess.Popen(args[0], shell=True, stdout=subprocess.PIPE)

def send_disk_usage(*args):
    du = psutil.disk_usage('/')
    response = {'total': du[0], 'used': du[1] }
    socketIO.emit('disk_usage_response', response)

    
def send_memory_usage(*args):
    du = psutil.virtual_memory()
    response = {'total': du[0], 'available': du[1], 'used': du[3] }
    socketIO.emit('memory_usage_response', response)

def send_memory_proc(*args):
    response = appmon.list()
    socketIO.emit('memory_proc_response', response)


def send_network_usage(*args):
    du =   psutil.net_io_counters(pernic=True)['Wi-Fi']  
    response = {'sent': du[0], 'received': du[1] }
    socketIO.emit('network_usage_response', response)

def send_enetwork_usage(*args):
    du =   psutil.net_io_counters(pernic=True)['Ethernet']  
    response = {'sent': du[0], 'received': du[1] }
    socketIO.emit('enetwork_usage_response', response)    

def send_cpu_usage(*args):
    cu = psutil.cpu_percent()
    cf = psutil.cpu_freq()[0]
    response = {'usage': cu, 'freq': cf}
    socketIO.emit('cpu_usage_response', response)


socketIO = SocketIO('localhost', 1337, LoggingNamespace)
socketIO.on('connect', on_connect)
socketIO.on('disconnect', on_disconnect)
socketIO.on('reconnect', on_reconnect)

# Listen
socketIO.on('get_disk_usage', send_disk_usage)
socketIO.on('get_memory_usage', send_memory_usage)
socketIO.on('get_network_usage', send_network_usage)
socketIO.on('get_enetwork_usage', send_enetwork_usage)
socketIO.on('get_cpu_usage', send_cpu_usage)
socketIO.on('get_memory_proc', send_memory_proc)
socketIO.on('client_kill_process', kill_process)
socketIO.on('client_spawn_process', spawn_process)
socketIO.on('show_alert', show_alert)

#socketIO = SocketIO('localhost', 8000)
socketIO.wait()











