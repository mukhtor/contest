from requests import post

code = {'code': open('code.php').read()}
req = post('http://127.0.0.1:5000/check', json=code)
print(req)
print(req.text)
