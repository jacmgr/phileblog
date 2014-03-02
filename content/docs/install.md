/*
title: Multiple Sites with One Library
date: 2013-12-10
chapter: 0.11
*/

## Error on  Install
~~~~
Fatal error: Call to undefined function Phile\openssl_random_pseudo_bytes() in C:\xampp\htdocs\phile2\one\lib\Phile\Utility.php on line 167
~~~~

Couldn't get it fixed, so I modified `\Phile\Utility.php`.
~~~~
//jacmgr:  had error on some servers with line 167
//$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
//replaced with this line
$rnd = hexdec(bin2hex(rand(1, $bytes)));

~~~~


## One Phile Multiple Sites

I wanted several sites using one Phile Install folder.  Structure something like this:

~~~~
-philesystem
   -/datastorage
   -/lib
   -/plugins
   -/temp
   -/themes
   -/vendor
-/SiteONE
   -index.php
   -config.php
   -default_config.php
   -generator.php
   -/content
-/SiteTWO
   -index.php
   -config.php
   -default_config.php
   -generator.php
   -/content  
-/SiteTHREE
   -index.php
   -config.php
   -default_config.php
   -generator.php
   -/content 
~~~~

Each site is accessed with a url

    mysite.com/SiteONE
    mysite.com/SiteTWO
    mysite.com/SiteTHREE

I made these adjustments in `index.php`
###FROM
~~~~
define('ROOT_DIR',         realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('CONTENT_DIR',      ROOT_DIR . 'content' . DIRECTORY_SEPARATOR);
define('CONTENT_EXT',      '.md');
define('LIB_DIR',          ROOT_DIR . 'lib' . DIRECTORY_SEPARATOR);
define('PLUGINS_DIR',      ROOT_DIR . 'plugins' . DIRECTORY_SEPARATOR);
define('THEMES_DIR',       ROOT_DIR . 'themes' . DIRECTORY_SEPARATOR);
define('CACHE_DIR',        LIB_DIR . 'cache' . DIRECTORY_SEPARATOR);
~~~~
###TO
~~~~
define('ROOTSITE_DIR',     realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('SYSTEMFOLDER',     'philecms');
define('ROOT_DIR',         realpath(dirname(ROOTSITE_DIR)) . DIRECTORY_SEPARATOR .SYSTEMFOLDER. DIRECTORY_SEPARATOR );
define('CONTENT_DIR',      ROOTSITE_DIR . 'content' . DIRECTORY_SEPARATOR);
//no changes below
define('CONTENT_EXT',      '.md');
define('LIB_DIR',          ROOT_DIR . 'lib' . DIRECTORY_SEPARATOR);
define('PLUGINS_DIR',      ROOT_DIR . 'plugins' . DIRECTORY_SEPARATOR);
define('THEMES_DIR',       ROOT_DIR . 'themes' . DIRECTORY_SEPARATOR);
define('CACHE_DIR',        LIB_DIR . 'cache' . DIRECTORY_SEPARATOR);
~~~~

And modified `core.php`

~~~~
protected function initConfiguration() {
  //jacmgr: see index.php; configs are in site root not system root
  //$defaults       = Utility::load(ROOT_DIR . '/default_config.php');
  //$localSettings  = Utility::load(ROOT_DIR . '/config.php');
            
  $defaults       = Utility::load(ROOTSITE_DIR . '/default_config.php');
  $localSettings  = Utility::load(ROOTSITE_DIR . '/config.php');
~~~~

Finally, note the theme url assigned to twig variables also needs revision; however, i was able to do this in a [plugin](plugins/plugin.jaccms).

~~~~
'theme_url' => dirname($this->settings['base_url']).'/'.SYSTEMFOLDER.'/'. basename(THEMES_DIR) .'/'. $this->settings['theme'],    
~~~~


Probably a better way, but for now that works and did not impact any other parts of phile.

Also works for the hole thing being in a subfolder. i.e.


    mysite.com/testsites/SiteONE
    mysite.com/testsites/SiteTWO
    mysite.com/testsites/SiteTHREE


You can also [view my config files](configfile)
