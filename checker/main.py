from flask import Flask, request, jsonify
from psutil import Popen
from time import time
import os

app = Flask(__name__)

php_disable_functions = 'disable_functions=system,exec,shell_exec,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,pcntl_exec,eval'


@app.route('/check', methods=['POST'])
def check():
    data = request.json
    t = time()
    out_file = f'output.txt{t}'
    output = open(out_file, 'w+')
    process = Popen(['php', '-d', php_disable_functions, '-r', data['code']], stdout=output, stderr=output)
    exit_code = -1
    result = ''
    try:
        exit_code = process.wait(5)
    except Exception as e:
        print(e)
    if process.is_running():
        process.kill()
    output.seek(0)
    result = output.read()
    output.close()
    os.remove(out_file)
    return jsonify({'exit_code': exit_code, 'result': result})


if __name__ == '__main__':
    app.run('0.0.0.0', 5000)
