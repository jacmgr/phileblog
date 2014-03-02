/*
Title: Changes to Pico Core
Author: jacmgr
============================
Date: 2013-09-12
chapter: Appendix.0
Layout: index_docs
Template: index_docs
*/

These are things I couldn't do by plugin.  SO I modified the core pico.php

## Current Version
* moved get_pages to top early in the script.  Other addons need the list of pages. pico waits till the end to generate the list.  So generate the list early

* added parameter to hook $this->run_hooks('before_read_file_meta', array(&$headers, $content));     in the read_file_meta method.  Plugins need the RAW CONTENT to get the actual meta.  Pico never send the raw content.  This hook gives plugin access to the raw content.

* Pico removing all comments from file.  So when I display php code with comments, pico removes the comments. [https://github.com/gilbitron/Pico/issues/67]().  See that issue for the easy fix. That's what I did.

### My old version abandoned.

Some day may add these features back in to core or plugin

* Add config to use TWIG or PHP template.
* Add class for viewproc function.
* $config['allowed_pagevars'] list of variables that can be used in markup.  Really may not use and you can put every variable in markup.
* $config['plugins'] = array(  A method to turn plugins on and off without having to delete them from the plugins folder
* $config['zones']  allows use if "zones" or sections of content in the template.  zones are based on pages. core could parse the identified zones.
* REMOVED parsing and excerpting every single page the content folder for every page display.  Now only needed pages are parsed for excerpted.
* cacheing the get pages array of pages so don't have to recreate it on every page load.
* moved the view register to early so plugins could use it anytime. 
* Added the jacview class for php views