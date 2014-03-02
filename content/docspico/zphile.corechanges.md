/*
Title: Changes to Pico Core
Author: jacmgr
============================
Date: 2013-09-12
chapter: Appendix.0
*/


index.php

changed location of the core libs in the defines.

ROOT_DIR is location of the lib/themes/plugins  etc....

Core.php
Modified protected function initConfiguration() 
so it uses ROOTSITE to get configs.
{
		//jdf: configs are in site root not system root
                //$defaults       = Utility::load(ROOT_DIR . '/default_config.php');
		//$localSettings  = Utility::load(ROOT_DIR . '/config.php');
                
                $defaults       = Utility::load(ROOTSITE_DIR . '/default_config.php');
		$localSettings  = Utility::load(ROOTSITE_DIR . '/config.php');
		
1) getting correct theme url	
'theme_url' => dirname($this->settings['base_url']).'/'.SYSTEMFOLDER.'/'. basename(THEMES_DIR) .'/'. $this->settings['theme'],    

2) Proper link URLS
* remove the <base tag from the head section
* fix the menu twig code to say
<li><a href="{{ base_url }}/{{ page.url }}">{{ page.title }}</a></li>

* added plugin for redirecting to index explicitely.

3) NEXT STEP PARSEING VARIABLES...... %base_url% etc.....
plugin -  PhileJacContentVariables
added getmetaARRAY to meta model.

in page model added pass by reference to the before parse hook.
