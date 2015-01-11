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
	pattern_label = '\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s]*\<\/label\>'
	pattern_input_field = '\[([\w-]*)\*?\s*([\w\d-]+)?'
	#pattern_label = '\<label(\sfor="[\w\d-]+")?\s*(\sclass="[\w\d-]+")?\s*\>\s*(.+)[\*\s]*\<\/label\>\s*\[([\w-]*)\*?\s+([\w\d-]+)'
	#pattern_input_field = ''
	is_mid_multiline = False
	label_matched = False
	field_type_matched = False
	field_match = False
	for line in incoming:
		logging.debug('Line: ' + line)
		# Init vars
		suffix = ""
		pattern = pattern_section
		if not is_mid_multiline:
			label_matched = False
			field_type_matched = False
			field_match = False
		if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
			result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
			logging.debug('Result groups: ')
			markup_begin = result.group(1).encode('utf-8')
			markup_end = result.group(3).encode('utf-8')
			section_title = result.group(2).encode('utf-8')
			output.write( markup_begin + section_title + markup_end + "\n")
		if is_mid_multiline:
			pattern = pattern_input_field
			# Add in other pattern to capture and print headings
			if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
				if result.group(1):
					field_type_matched = True
					field_type = result.group(1).encode('utf-8')
				else:
					field_type_matched = False
					field_type = ""
				if result.group(1):
					field_matched = True
					field = result.group(1).encode('utf-8')
				else:
					field_matched = False
					field = ""
				logging.debug('Label: ' + label)
				logging.debug('Result groups: ')
				logging.debug(result.groups())
		else:
			pattern = pattern_label + '\s*' + pattern_input_field
			# Add in other pattern to capture and print headings
			if re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U ):
				result = re.search(pattern.decode('utf-8'),line.decode('utf-8'), re.I | re.U )
				if result.group(3):
					label_matched = True
					label = result.group(3).encode('utf-8')
				else:
					label_matched = False
					label = ""
				if result.group(4):
					field_type_matched = True
					field_type = result.group(4).encode('utf-8')
				else:
					field_type_matched = False
					field_type = ""
				if result.group(5):
					field_matched = True
					field = result.group(5).encode('utf-8')
				else:
					field_matched = False
					field = ""
				logging.debug('Label: ' + label)
				logging.debug('Result groups: ')
				logging.debug(result.groups())
		#if field_type_matched:
		#	print "field_type matched"
		#else:
		#	print "field_type matched not"
		# Add a line break after last mailing address field (Zip code). Layout specific.
		if label_matched:
			if field_type_matched and field_matched:
				is_mid_multiline = False
				logging.debug("Info found. Printout label, field type and name.")
				if re.match("date", field_type, re.I):
					# Change formatting to U.S. style
					field = "_format_" + field + ' "m/d/y"'
				if re.match(".*-zip", field, re.I):
					suffix = "<br/>"
				output.write( "<strong>" + label + ":</strong> [" + field + "]" + suffix + "\n")
			#else:
				#print "Not matched"
			else:
				logging.debug("Info not found. Keep searching.")
				# Found a label for input. Keep looking for CF7 tag for field type and name.
				is_mid_multiline = True
		else:
			logging.debug("Info not found. Not mutliline.")
	
if __name__=="__main__":
	main()
