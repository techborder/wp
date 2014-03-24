#!/usr/bin/env python
#coding=utf8
import re
import argparse
import sys

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

	pattern_section = '(\<h\d\>)\<span class="section-title"\s*\>\s*(.+)\s*\<\/span\>(\<\/h\d\>)'
	incoming = options.infile
	output = options.outfile
	pattern_label = '\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s]*\<\/label\>\s*\[([\w-]*)\*?\s+([\w\d-]+)'
	for line in incoming:
		# DEBUG
		#print "Line: " + line
		suffix = ""
		pattern = pattern_section
		if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
			result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
			# DEBUG
			#print result.groups()
			markup_begin = result.group(1).encode('utf-8')
			markup_end = result.group(3).encode('utf-8')
			section_title = result.group(2).encode('utf-8')
			output.write( markup_begin + section_title + markup_end + "\n")
		pattern = pattern_label
		# Add in other pattern to capture and print headings
		if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
			result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
			label = result.group(3).encode('utf-8')
			field_type = result.group(4).encode('utf-8')
			field = result.group(5).encode('utf-8')
			# Add a line break after last mailing address field (Zip code). Layout specific.
			if re.match("date", field_type, re.I):
				# Change formatting to U.S. style
				field = "_format_" + field + ' "m/d/y"'
			if re.match(".*-zip", field, re.I):
				suffix = "<br/>"
			output.write( "<strong>" + label + "</strong> [" + field + "]" + suffix + "\n")
			# DEBUG
			#print label
			#print result.groups()
	
if __name__=="__main__":
	main()
