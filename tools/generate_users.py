#!/usr/bin/python

import sys
import hashlib
import random

r = sys.argv[1]
s = sys.argv[2]
c = sys.argv[3]
l = sys.argv[4]

roster = open(r, 'r')
sql = open(s, 'w')
card = open(c, 'w')
log = open(l, 'w')

def getRandString():
        return ''.join(random.sample('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890!@#$%^&*()_+', 8))

for line in roster:
        if line != '\n':
                name = line.strip()
                m = hashlib.md5()
                pas = getRandString()
                salt = getRandString() 
                m.update(salt+pas+'\n')
                md5 = m.hexdigest()
                forCards = name + ", " + pas + "\n"
                card.write(forCards)
                forSql = "INSERT INTO tbl_user (username, password, salt) VALUES ('" + name + "', '" + md5 + "', '" + salt + "');\n"
                sql.write(forSql)
                forLog = ', '.join([name, pas, salt, md5])
                log.write(forLog + '\n')
        else:
                card.write("\n")

card.close()
sql.close()
roster.close()
