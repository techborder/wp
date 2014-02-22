#!/usr/bin/env python
#coding=utf8
import re

def main():
	#code
	
	pattern = '\[\w\w+\*? ([a-z0-9-]+)'
	with open('/var/www/wp/devglc/wp-content/plugins/contact-form-7-config/application-form-employment-goodlife.html') as f:
		for line in f:
			if re.search(pattern,line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern,line.decode('utf-8'), re.I | re.U )
				field = result.group(1).encode('utf8')
				print "<strong>" + field.replace("-"," ").title() + ":</strong> [" + field + "]"
				
	#result = re.search(pattern,s.decode('utf-8'), re.I | re.U )
	
	# Flags: re.U is for Unicode. re.I to ignore case.
	#print result.group(0)

if __name__=="__main__":
	main()