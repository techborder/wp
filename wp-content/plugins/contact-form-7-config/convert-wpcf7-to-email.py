#!/usr/bin/env python
#coding=utf8
import re

def main():
	patternSection = '(\<h\d\>)\<span class="section-title"\s*\>\s*([\w\d\s\?:,.\(\)\/\"\'-]+)\s*\<\/span\>(\<\/h\d\>)'
	# This regex will not detect quotes that are slanted (e.g. commonly from Microsoft Word or Outlook). Must convert these funky quotes to the coresponding ones on the keyboard " or '.
	patternLabel = '(\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*([\w\d\s\?:,.\(\)\/\"\'-]+))[\*\s*]*\<\/label\>\s*\[[\w-]*\*?\s+([\w\d-]+)'
	with open('/var/www/wp/devglc/wp-content/plugins/contact-form-7-config/application-form-employment-goodlife.html') as f:
		for line in f:
			pattern = patternLabel
			# Add in other pattern to capture and print headings
			if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
				label = result.group(1).encode('utf-8')
				#field = result.group(2).encode('utf-8')
				#print "<strong>" + label + ":</strong> [" + field + "]"
				# DEBUG
				print result.group(1).encode('utf-8')
				#print result.groups()
			pattern = patternSection
			if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
				print result.groups()
	
if __name__=="__main__":
	main()