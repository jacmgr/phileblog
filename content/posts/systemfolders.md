/*
title: Multi Sites on One Lib
date: January 27 2014
*/

I wanted to be able to run multiple sites on one phile system folder.  This is the method I came up with.  I am sure eventually phile developers will come up with a better way.

[[#ENDSUMMARY]]

 
~~~~
/*
 * SYSTEM PATHS
 * jacmgr: modified so that phile system code can be any folder outside the site folder.
 *         Also had to modify the Core at about line 170
 * 
 */
define('ROOTSITE_DIR',     realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('SYSTEMFOLDER',     'philecms');
define('ROOT_DIR',         realpath(dirname(ROOTSITE_DIR)) . DIRECTORY_SEPARATOR .SYSTEMFOLDER. DIRECTORY_SEPARATOR );

define('CONTENT_DIR',      ROOTSITE_DIR . 'content' . DIRECTORY_SEPARATOR);

define('CONTENT_EXT',      '.md');
define('LIB_DIR',          ROOT_DIR . 'lib' . DIRECTORY_SEPARATOR);
define('PLUGINS_DIR',      ROOT_DIR . 'plugins' . DIRECTORY_SEPARATOR);
define('THEMES_DIR',       ROOT_DIR . 'themes' . DIRECTORY_SEPARATOR);
define('CACHE_DIR',        LIB_DIR . 'cache' . DIRECTORY_SEPARATOR); 
~~~~

