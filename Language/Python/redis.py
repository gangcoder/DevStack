#!/usr/bin/env python
#@author xugang
#@date   2015.5
#pip install redis

import redis

redis
r = redis.StrictRedis(host = 'localhost', port = 6379, db=1)
r.set('foo', 'bar')
print(r.get('foo'))
