#!/usr/bin/env python
#@author xugang
#@date   2015.5
#pip mysql-connector-python

# mysql
conn = mysql.connector.connect(
    user='lowestprice',
    password='lowestprice',
    database='lowestprice',
    use_unicode=True)

cursor = conn.cursor()

cursor.execute('create table user(id varchar(20) primary key, name varchar(20))')