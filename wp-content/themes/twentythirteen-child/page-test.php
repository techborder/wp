<?php
/* Template Name: Test */
get_header();
//Works:
//wp_mail('dvd.regal@gmail.com', 'Test WP Email', 'This is a test message',  $headers); 
//Doesn't:
//wp_mail('david.regal@techborder.com', 'Test WP Email 1715', 'This is a test message',  $headers); 
$headers = 'From: Techborder <david.regal@techborder.com>' . "\r\n\\";
// Doesn't:
//wp_mail('david.regal@techborder.com', 'Test WP Email 1715', 'This is a test message',  $headers); 
$testtime="1853";
wp_mail('dcregal@gmail.com', 'Test WP Email ' . $testtime, 'This is a test message',  $headers); 
wp_mail('dregal@wingsnw.com', 'Test WP Email ' . $testtime, 'This is a test message',  $headers); 
get_footer(); ?>
