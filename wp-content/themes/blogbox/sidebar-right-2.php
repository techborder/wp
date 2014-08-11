<?php
/**
 * Template part file that contains the right sidebar content
 *
 * This file is called by page-right_sidebar.php
 * 
 *
 * @package		blogBox WordPress Theme
 * @copyright	Copyright (c) 2012, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<div id="sidebar">
	<?php if ( !dynamic_sidebar('Right-Sidebar 2') ) : ?>
		<h2><?php _e('Right Sidebar 2','blogBox') ?></h2>
		<p><?php _e('Go to Appearance => Widgets and drag a widget over to this sidebar.','blogBox') ?></p>
	<?php endif; ?>
</div>