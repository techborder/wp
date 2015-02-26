<?php

// load wordpress
require_once('get_wp.php');

class ruven_shortcodes
{
	var	$conf;
	var	$popup;
	var	$params;
	var	$shortcode;
	var $cparams;
	var $cshortcode;
	var $popup_title;
	var $data_name;
	var $no_preview;
	var $has_child;
	var	$output;
	var	$errors;

	// --------------------------------------------------------------------------

	function __construct( $popup )
	{
		if( file_exists( dirname(__FILE__) . '/config.php' ) )
		{
			$this->conf = dirname(__FILE__) . '/config.php';
			$this->popup = $popup;
			
			$this->formate_shortcode();
		}
		else
		{
			$this->append_error('Config file does not exist');
		}
	}
	
	// --------------------------------------------------------------------------
	
	function formate_shortcode()
	{
	
		// get config file
		require_once( $this->conf );

		if( isset( $ruven_shortcodes ) && is_array( $ruven_shortcodes ) )
		{
			$this->popup_title = $ruven_shortcodes[$this->popup]['popup_title'];
			$this->content = $ruven_shortcodes[$this->popup]['content'];
			$this->data_name = $ruven_shortcodes[$this->popup]['data_name'];
			
			$output = $this->content;
			$this->append_output( $output );		
		}
	}
	
	// --------------------------------------------------------------------------
	
	function append_output( $output )
	{
		$this->output = $this->output . "\n" . $output;		
	}
	
	// --------------------------------------------------------------------------
	
	function reset_output( $output )
	{
		$this->output = '';
	}
	
	// --------------------------------------------------------------------------
	
	function append_error( $error )
	{
		$this->errors = $this->errors . "\n" . $error;
	}
}

?>