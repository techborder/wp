<?php
$lz_default['general']=array(
	'site_title'=>'%1$s %2$s',
	'logo'=>get_template_directory_uri().'/images/logo.png',
	'favicon'=>'',
	'footer_txt'=>'&copy; '.get_bloginfo('name'),
);
$lz_default['slider']=array(
	'slides'=>array(
	),
	'innerpages'=>true,
	'speed'=>'2000',
	'delay'=>'5000',
	'effect'=>'fade'
);
$lz_default['showroom']=array(
	'showroomsrc'=>'page',
	'onlymarked'=>true,
	'length'=>100,
	'srinnerpages'=>false,
	'srreadmore'=>'Read more'
);
$lz_default['layout']=array(
	'pagination'=>'dynamic',
	'postmeta'=>'By %3$s in %2$s, Releases with %4$s',
	'fimage_width'=>225,
	'fimage_height'=>150,
	'cutcontent'=>true,
	'contentlength'=>800,
	'fimage_position'=>'alignleft',
	'relatedposts'=>true
);

$lz_default['menus']=array(
	'effect'=>'slidedown',
	'speed'=>'500',
	'delay'=>'800',
	'showarrows'=>true
);
$lz_default['integration']=array(
	'css'=>'',
	'headcode'=>''
);
$lz_default['elements']=array(
	'logo'=>array('title'=>__( 'Logo', 'lizard' ), 'show'=>true, 'help'=>'logo', 'edit'=>'admin.php?page=LZSettings&section=general'),
	'search'=>array('title'=>__( 'Search', 'lizard' ), 'show'=>true, 'help'=>'search', 'edit'=>'widgets.php'),
	'secondary-menu'=>array('title'=>__( 'Secondary Menu', 'lizard' ), 'show'=>true, 'help'=>'menus', 'edit'=>'nav-menus.php'),
	'main-menu'=>array('title'=>__( 'Main Menu', 'lizard' ), 'show'=>true, 'help'=>'menus', 'edit'=>'nav-menus.php'),
	'slider'=>array('title'=>__( 'Slider', 'lizard' ), 'show'=>true, 'help'=>'slider', 'edit'=>'admin.php?page=LZSettings&section=slider'),
	'showroom'=>array('title'=>__( 'Showroom', 'lizard' ), 'show'=>true, 'help'=>'showroom', 'edit'=>'admin.php?page=LZSettings&section=showroom'),
	'leftsidebar'=>array('title'=>__( 'Left Sidebar', 'lizard' ), 'show'=>false, 'help'=>'sidebar', 'edit'=>'widgets.php'),
	'rightsidebar'=>array('title'=>__( 'Right Sidebar', 'lizard' ), 'show'=>true, 'help'=>'sidebar', 'edit'=>'widgets.php'),
	'footer'=>array('title'=>__( 'Footer', 'lizard' ), 'show'=>true, 'help'=>'footer', 'edit'=>'widgets.php')
);
$lz_default['fonts']=array(
	'heading'=>'Open Sans',
	'body'=>'Open Sans',
	'menu'=>'Open Sans'
);