from flask import Flask, request, jsonify
from psutil import Popen

app = Flask(__name__)

php_disable_functions = 'disable_functions=system,exec,shell_exec,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,pcntl_exec,eval'


@app.route('/check', methods=['POST'])
def check():
    data = request.json
    output = open('output.txt', 'w+')
    process = Popen(['php', '-d', php_disable_functions, '-r', data['code']], stdout=output)
    exit_code = -1
    result = ''
    try:
        exit_code = process.wait(30)
        output.seek(0)
        result = output.read()
    except Exception as e:
        print(e)
    if process.is_running():
        process.kill()
    output.close()
    return jsonify({'exit_code': exit_code, 'result': result})


if __name__ == '__main__':
    app.run('0.0.0.0', 5000)
