#!/usr/bin/env python
# -*- coding: utf-8 -*-

import httplib2
import oauth2
import time
import web
from urllib import quote
from urllib import unquote

import json

OAUTH_CONSUMER_KEY = "BOSS KEY HERE"
OAUTH_CONSUMER_SECRET = "BOSS SECRET KEY HERE"

urls = (
  '/', 'index'
)

def processData(data):
    fh = open('query.txt', 'r')
    l = fh.next()
    data = json.loads(data)
    results = data['bossresponse']['web']['results']
    
    
    #Make array for each website
    arr = []
    wiki = []
    sof = []
    yahoo = []
    quora = []
    google = []
    
    count = 0
    
    #iterate through them, if exists in the returning query, push them and append their rank
    for e in results:
        count+=1
        if('wikipedia' in e['clickurl']):
            wiki.append({'rank' : count, 'data': e})
        elif('stackoverflow' in e['clickurl']):
            sof.append({'rank' : count, 'data': e})
        elif('answers.yahoo' in e['clickurl']):
            yahoo.append({'rank' : count, 'data': e})
        elif('quora' in e['clickurl']):
            quora.append({'rank' : count, 'data': e})
        elif('answers.google' in e['clickurl']):
            google.append({'rank' : count, 'data': e})
            
    if(len(wiki)):
        arr.append({'website': 'wikipedia', 'results' : wiki, 'high' : wiki[0]['rank']})
    if(len(sof)):    
        arr.append({'website': 'stackoverflow','results' : sof, 'high' : sof[0]['rank']})
    if(len(yahoo)):
        arr.append({'website': 'yahoo','results' : yahoo, 'high' : yahoo[0]['rank']})
    if(len(quora)):
        arr.append({'website': 'quora','results' : quora, 'high' : quora[0]['rank']})
    if(len(google)):
        arr.append({'website': 'google', 'results' : google, 'high' : google[0]['rank']})
    
    #sort websites by rank
    arr.sort(key=lambda x: x['high'])
    return json.dumps(arr)

class index:
    def GET(self):
        if(not web.input()['s']):
            return "Must have query"
        web.input()['s'] = unquote(web.input()['s'])
        url = "http://yboss.yahooapis.com/ysearch/web?q=" + str(quote(web.input()['s']))
        consumer = oauth2.Consumer(key=OAUTH_CONSUMER_KEY,secret=OAUTH_CONSUMER_SECRET)
        params = {
            'oauth_version': '1.0',
            'oauth_nonce': oauth2.generate_nonce(),
            'oauth_timestamp': int(time.time()),
        }
    
        oauth_request = oauth2.Request(method='GET', url=url, parameters=params)
        oauth_request.sign_request(oauth2.SignatureMethod_HMAC_SHA1(), consumer, None)
        oauth_header=oauth_request.to_header(realm='yahooapis.com')
    
        # Get search results
        http = httplib2.Http()
        resp, content = http.request(url, 'GET', headers=oauth_header)
        print resp
        return processData(content)
    

        
if __name__ == "__main__": 
    app = web.application(urls, globals())
    app.run()  
            