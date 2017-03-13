import subprocess

class AppMon:
    def __init__(self):
        print("hello")

    def list(self):

        cmd = 'WMIC PROCESS get Caption,Processid'
        proc = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
        for line in proc.stdout:
            print(line)

