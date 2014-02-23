#!/usr/bin/env python
#coding=utf8
import re

def main():
	pattern_section = '(\<h\d\>)\<span class="section-title"\s*\>\s*(.+)\s*\<\/span\>(\<\/h\d\>)'
	pattern_label = '\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s*]*\<\/label\>\s*\[[\w-]*\*?\s+([\w\d-]+)'
	with open('/var/www/wp/devglc/wp-content/plugins/contact-form-7-config/application-form-employment-goodlife.html') as f:
		for line in f:
			# DEBUG
			#print "Line: " + line
			pattern = pattern_section
			if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
				# DEBUG
				#print result.groups()
				markup_begin = result.group(1).encode('utf-8')
				markup_end = result.group(3).encode('utf-8')
				section_title = result.group(2).encode('utf-8')
				print markup_begin + section_title + markup_end;
			pattern = pattern_label
			# Add in other pattern to capture and print headings
			if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
				label = result.group(3).encode('utf-8')
				field = result.group(4).encode('utf-8')
				print "<strong>" + label + ":</strong> [" + field + "]"
				# DEBUG
				#print label
				#print result.groups()
	
if __name__=="__main__":
	main()