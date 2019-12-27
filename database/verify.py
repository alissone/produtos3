import subprocess
from time import sleep
command = "fuser database.sqlite"

while True:
    process = subprocess.Popen(command, stdout=subprocess.PIPE, stderr=None, shell=True)
    out = process.communicate()
    out_number = out[0].decode('utf-8').strip()
    print()
    process = subprocess.Popen("ls -alF /proc/{}/exe".format(out_number), stdout=subprocess.PIPE, stderr=None, shell=True)
    out = process.communicate()
    process_name_raw = (out[0].decode('utf-8'))
    if not 'No such' in out_number:
        print(process_name_raw)
    # print(out[0].split(':')[-1])
    sleep(1)