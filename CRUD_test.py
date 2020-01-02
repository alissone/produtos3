# -*- coding: utf-8 -*-

import requests

def request_info(request,show_text=False):
    print('>>> Status Code:')
    print(request.status_code)
    print('>>> Headers:')
    print(request.headers)
    print('>>> Encoding:')
    print(request.encoding)

    if show_text:
        print('>>> Text:')
        print(request.text)

    if 'application/json' in request.headers['content-type']:
        print('>>> JSON:')
        print(request.json())

    print('\n')


base_url = 'http://127.0.0.1:8000'

request_info(requests.get(base_url+'/products'))
request_info(requests.get(base_url+'/products/create'),show_text=True)
request_info(requests.get(base_url+'/products/152'))

payload = {'name': "Alisson", 'price':1.99, 'quantity':6}

request_info(requests.post(base_url+'/products', data=payload),show_text=True)

request_info(requests.delete(base_url+'/products/152', data=payload),show_text=True)