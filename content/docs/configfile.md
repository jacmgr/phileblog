/*
title: Config Files
date: 2013-12-10
chapter: 0.12
*/

Here are my `config.php` and `default_config.php`.  NOte phile loads config first and then default_config.  I think I need to make a little better distinction about what to keep in each one.



## config.php
~~~~
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

~~~~

## default_config.php

~~~~
<?php

// try to figure out the install path
$config['site_title'] = 'jacmgr\'s fork'; // Site title
// jdf: SOme thems have seubtotle for title
$config['site_slogan'] = 'of PhileCMS'; // Site title

$config['base_url'] = \Phile\Utility::getBaseUrl(); // use the Utility class to guess the base_url
$config['theme'] = 'default'; // Set the theme
$config['date_format'] = 'jS M Y'; // Set the PHP date format
$config['pages_order_by'] = 'title'; // Order pages by "title" (alpha) or "date"
$config['pages_order'] = 'desc'; // Order pages "asc" or "desc"

// ===========================================================
// figure out the timezone
$timezone = (ini_get('date.timezone')) ? ini_get('date.timezone') : 'UTC';
$config['timezone'] = $timezone; // The default timezone

// ===========================================================
// only extend $config['plugins'] and not overwrite it, because some core plugins
// will be added to this config option by default. So, use this option in this way:
// $config['plugins']['myCustomPlugin'] = array('active' => true);
// also notice, each plugin has its own config namespace.
// activate plugins
$config['plugins'] = array(
  'phileDemoPlugin' => array('active' => true),
  'phileParserMarkdown' => array('active' => true), // the default parser
  'phileTemplateTwig' => array('active' => true), // the default template engine
  //'philePhpFastCache' => array('active' => true), // the default cache engine
  //'phileSimpleFileDataPersistence' => array('active' => true), // the default data storage engine
);
//easier to comment out plugins
//$config['plugins']['philePhpFastCache'] = array('active' => true);
//$config['plugins']['phileSimpleFileDataPersistence'] = array('active' => true);

//jacmgr: new jacmgr plugins
$config['plugins']['phileJacCms'] = array('active' => true);
$config['plugins']['phileJacCmsMeta'] = array('active' => true);
$config['plugins']['phileJacContentVariables'] = array('active' => true);
$config['plugins']['phileJacWikittenTree'] = array('active' => true);
$config['plugins']['phileJacShortcode'] = array('active' => true);
$config['plugins']['phileJacShortcodeInclude'] = array('active' => true);
$config['plugins']['phileJacShortcodeAmazon'] = array('active' => true);
$config['plugins']['phileJacShortcodeGallery'] = array('active' => true);
$config['plugins']['phileJacMiniAuth'] = array('active' => true);
$config['plugins']['phileJacMiniEdit'] = array('active' => true);  //future delet if make a filemanager

$config['plugins']['phileJacShortcodeSearch'] = array('active' => true);

$config['plugins']['phileJacZones'] = array('active' => true);

//jacmgr: Some other plugins
$config['plugins']['phileXMLSitemap'] = array('active' => true);
$config['plugins']['phileRSSFeed'] = array('active' => true);

//used by JacMiniEdit
// set to false to turn off edit ability
$config['enableEDIT'] = true;

//COMMENT SYSTEM
//Flag used in template to implement comment system
//also depends on page meta to turn comments off or on
$config['comments'] = true;

// SHOULD BE ABLE TO SET TWIG DEBUG HERE.....NOT JUST IN PLUGIN....
// 
// ===========================================================
// You must end by returning the config array
return $config;

~~~~