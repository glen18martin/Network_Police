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
            self.processList.append(process)



        for process in self.processList:

            if len(process[0]) > 0:
                print("Hashing " + process[0])
                cmd = 'certUtil -hashfile "' + process[0] + '" md5 | find /v "hash of file" | find /v "Cert"'

                proc = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
                for line in proc.stdout:
                    print(line.decode("UTF-8").replace(" ", ""))
