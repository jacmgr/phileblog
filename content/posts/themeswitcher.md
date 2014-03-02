/*
Title: Switching Themes
Author: jacmgr
date: 06 November 2013
*/

## Temporary Theme Switch

AS I test different themes, wanted a quick and dirty way to switch between themes.  No plugins, just some code in the config.php file and added some links in the bottom zone of my templates.

### Config.php
~~~~
// Temporary theme switcher for testing
//session_start(); //need for theme switcher
 \Phile\Session::start();
if(isset($_GET['sitetheme']))
 {
 	if ($_GET['sitetheme'] =='default') \Phile\Session::set('sitetheme', 'default' );
 	if ($_GET['sitetheme'] =='tales') \Phile\Session::set('sitetheme', 'tales' ); 
    if ($_GET['sitetheme'] =='wikitten') $_SESSION['sitetheme'] = 'wikitten';
 }

if((\Phile\Session::get('sitetheme')))
{
	$config['theme'] = \Phile\Session::get('sitetheme');
}
~~~~


### bottom.md

I put a theme switcher links in the bottom of each template.

~~~~
/*
Title: Bottom
Description: Text for the bottom Zone
*/
[Rss Feed](\% base_url%/feed)  |  [Site Map](\% base_url%/sitemap.xml) | Choose Theme: [Wikitten](?sitetheme=wikitten) : [Default](?sitetheme=default) : [Default](?sitetheme=tales)

~~~~
