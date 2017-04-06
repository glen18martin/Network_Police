import logging
from socketIO_client import SocketIO, LoggingNamespace

import win32gui, win32ui, win32con, win32api
import datetime

def capture_screenshot():
	date_string = datetime.datetime.now().strftime("%Y-%m-%dh%Hm%Ms%S")
	hwin = win32gui.GetDesktopWindow()
	width = win32api.GetSystemMetrics(win32con.SM_CXVIRTUALSCREEN)
	height = win32api.GetSystemMetrics(win32con.SM_CYVIRTUALSCREEN)
	left = win32api.GetSystemMetrics(win32con.SM_XVIRTUALSCREEN)
	top = win32api.GetSystemMetrics(win32con.SM_YVIRTUALSCREEN)
	hwindc = win32gui.GetWindowDC(hwin)
	srcdc = win32ui.CreateDCFromHandle(hwindc)
	memdc = srcdc.CreateCompatibleDC()
	bmp = win32ui.CreateBitmap()
	bmp.CreateCompatibleBitmap(srcdc, width, height)
	memdc.SelectObject(bmp)
	memdc.BitBlt((0, 0), (width, height), srcdc, (left, top), win32con.SRCCOPY)
	imgpath = 'screenshots\screenshot'+date_string+'.bmp'
	print(imgpath)
	bmp.SaveBitmapFile(memdc, imgpath)


def on_connect():
    print('connect')
    socketIO.emit('ident', clientid)

def on_disconnect():
    print('disconnect')

def on_reconnect():
    print('reconnect')
    socketIO.emit('ident', clientid)
	
	
	
socketIO = SocketIO('localhost', 1337, LoggingNamespace)
socketIO.on('connect', on_connect)
socketIO.on('disconnect', on_disconnect)
socketIO.on('reconnect', on_reconnect)
# Listen
socketIO.on('capture_screenshot', capture_screenshot)

#socketIO = SocketIO('localhost', 8000)
socketIO.wait()



