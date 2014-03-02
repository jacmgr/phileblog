<?php

// use this config file to overwrite the defaults from default_config.php
// or to make local config changes.
$config = array();
$config['encryptionKey'] = 'jackey';
// ===========================================================
$config['theme'] = 'tales'; // Set the theme
//$config['theme'] = 'talesurichip'; // Set the theme
//$config['theme'] = 'default'; // Set the theme
// ===========================================================
// ZONES USED IN THEME
$config['zones'] = array( 'side' => 'sidebar', 
			  'bottom' =>'bottom',
                          'bottomleft'=>'bottomleft',
                          'bottomcenter'=>'bottomcenter',
                          'bottomright'=>'bottomright',
                          'featured'=>'zone_featured'
                        );
// Temporary theme switcher for testing
//session_start(); //need for theme switcher
 \Phile\Session::start();
if(isset($_GET['sitetheme']))
 {
 	/*
        if ($_GET['sitetheme'] =='bootstrap') $_SESSION['sitetheme'] = 'bootstrap';
 	if ($_GET['sitetheme'] =='wikitten') $_SESSION['sitetheme'] = 'wikitten';
 	if ($_GET['sitetheme'] =='outdoor0') $_SESSION['sitetheme'] = 'outdoor0'; 	
 	if ($_GET['sitetheme'] =='default') $_SESSION['sitetheme'] = 'default'; 
 	if ($_GET['sitetheme'] =='delphic') $_SESSION['sitetheme'] = 'v2_delphic';
 	if ($_GET['sitetheme'] =='tales') $_SESSION['sitetheme'] = 'talesurichip';
 	*/

 	if ($_GET['sitetheme'] =='default') \Phile\Session::set('sitetheme', 'default' );

 	if ($_GET['sitetheme'] =='tales') \Phile\Session::set('sitetheme', 'tales' ); 
        
        if ($_GET['sitetheme'] =='wikitten') $_SESSION['sitetheme'] = 'wikitten';
 }

if((\Phile\Session::get('sitetheme')))
{
$config['theme'] = \Phile\Session::get('sitetheme');
}
// ===========================================================
// The editor and page source need special css and divs in layout to properly show.
// also needs the codemirror javascript.  I don't feel like setting that up in every theme.
// It is already nicely set up in wikitten theme, So for now when want 
// to show page source, simply swicth to wikitten theme.
// Future each theme should have the necessary css for propoer display
// The editor/page source is in plugin: jaccms_editor.php
$config['editor']['theme'] = 'wikitten';
if( (isset ($_GET['source'])) && ($_GET['source'] == 'true')) 
{
	$config['theme'] = $config['editor']['theme'];
}		

// ===========================================================
// it is important to return the $config array!
return $config;
