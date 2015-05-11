#!/usr/bin/env python
#coding=utf8
# Common section
import re
import argparse
import sys
import logging
import os

def get_args_parser():
	parser = argparse.ArgumentParser(add_help=False)
	parser.add_argument("-i", "--infile",
		default=sys.stdin,
		nargs='?',
		type=argparse.FileType('r'),
		help="Input file. Defaults to standard in.")
	parser.add_argument("-o", "--outfile",
		default=sys.stdout,
		nargs='?',
		type=argparse.FileType('w'),
		help="Output result file. Defaults to standard out.")
	parser.add_argument("--debug",
		default=False,
		action='store_true',
		help="Debug log enable.")
	parser.add_argument("--help",
		default=False,
		action='store_true',
		help="show this help message and exit.")
	return parser

def main():
	parser = get_args_parser()
	options = parser.parse_args()
	if options.help:
		parser.print_help()
		parser.exit()

	if options.debug:
		if not os.path.isdir("log"):
			os.mkdir("log")
		logging.basicConfig(
			format='%(asctime)s - (%(threadName)s) - %(message)s in %(funcName)s() at %(filename)s : %(lineno)s',
			level=logging.DEBUG,
			filename="log/debug.log",
			filemode='w',
		)
		logging.debug(options)
	else:
		logging.basicConfig(handler=logging.NullHandler)
	incoming = options.infile
	output = options.outfile
	# End common section

	pattern_section = '(\<h\d\>)\<span class="section-title"\s*\>\s*(.+)\s*\<\/span\>(\<\/h\d\>)'
	#\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s]*\<\/label\>\s*\[([\w-]*)\*?\s+([\w\d-]+)
	#pattern_label = '\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s]*\<\/label\>'
	#pattern_input_field = '\[([\w-]*)\*?\s*([\w\d-]+)?'
	pattern_label = '\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s]*\<\/label\>\s*\[([\w-]*)\*?\s+([\w\d-]+)'
	pattern_input_field = ''
	for line in incoming:
		logging.debug('Line: ' + line)
		suffix = ""
		pattern = pattern_section
		if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
			result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
			logging.debug('Result groups: ')
			markup_begin = result.group(1).encode('utf-8')
			markup_end = result.group(3).encode('utf-8')
			section_title = result.group(2).encode('utf-8')
			output.write( markup_begin + section_title + markup_end + "\n")
		pattern = pattern_section + '' + pattern_input_field
		# Single line pattern match
		# Add in other pattern to capture and print headings
		if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
			result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
			if result.group(3):
				label = result.group(3).encode('utf-8')
				label_matched = true
			else:
				label = ""
			if result.group(4):
				field_type = result.group(4).encode('utf-8')
				field_type_matched = true
			else:
				field_type = ""
			if result.group(5):
				field = result.group(5).encode('utf-8')
			else:
				field = ""
			logging.debug('Label: ' + label)
			logging.debug('Result groups: ')
			logging.debug(result.groups())
			if field_type_matched:
				print "field_type matched"
			else:
				print "field_type matched not"
			# Add a line break after last mailing address field (Zip code). Layout specific.
			if re.match("date", field_type, re.I):
				# Change formatting to U.S. style
				field = "_format_" + field + ' "m/d/y"'
			if re.match(".*-zip", field, re.I):
				suffix = "<br/>"
			output.write( "<strong>" + label + ":</strong> [" + field + "]" + suffix + "\n")
	
if __name__=="__main__":
	main()
