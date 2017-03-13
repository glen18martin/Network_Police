import subprocess
import re

class AppMon:

    processList = []

    def __init__(self):
        print("hello")

    def list(self):
        cmd = 'WMIC PROCESS get Processid,ExecutablePath'
        proc = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
        for line in proc.stdout:
            process = re.split("  +", line.decode("utf-8"))
            if len(process) is 3:
                self.processList.append({'pid':process[1], 'path':process[0]})



        for process in self.processList:

            if len(process['path']) > 0:
                print("Hashing " + process['path'])
                cmd = 'certUtil -hashfile "' + process['path'] + '" md5 | find /v "hash of file" | find /v "Cert"'

                proc = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
                hash = ""
                for line in proc.stdout:
                    hash = line.decode("UTF-8").replace(" ", "")
                process['hash'] = hash.strip()

        print(self.processList)
