/*
Title: Jaccms Core Plugin
author: jacmgr
==================
pluginname: jaccms_core
description: Some simple core features apply site wide
version: 0.5
revisiondate: 21 OCT 2013
pluginauthor: jacmgr
==================
chapter: plugins.1
*/

%description%

[[#ENDSUMMARY]]

## Theme folder URL

Allow the System to use a SYSTEM folder outside of the site folder.  All that is in the site folder index, config, and direct files related to site.  These DEFINES are made in INDEX.PHP. So no plugin required. See [install page](../install).  However, the TWIG VARS template folder also needs to be adjusted so themes can be in the SYSTEMFOLDER. Currently the core seems to hardwire it.  So use the `template_engine_registered` event to adjust the theme folder.

~~~~
if ($eventKey == 'template_engine_registered') {
	$settings = $data['data']['config'];  //see the trigger for data structure
	//reset the twig vars {'theme_url']
	$data['data']['theme_url'] = dirname($settings['base_url']).'/'.SYSTEMFOLDER.'/'. basename(THEMES_DIR) .'/'. $settings['theme'];
~~~~

## Parsing relative links

In markdown i ran into problems with relative links when the URI was `index` and the url in browser does not include `index`.  To have relative links properly parsed, the page url must have a real page name in it in the browser.  So although `/sitename/subfolder` will properly show the page `subfolder/index`; any links on the page will be to `/sitename/thelinks` to fix this when detect one of these index pages, I redirect to `sitename/subfolder/index` to get the proper relative links working.

This is because I don;t want to have to include full links in my markdown.  99% of the time the links are to pages within the same subfolder.  The index pages often have many links to these pages.

Use the `request_uri` event to process this.
~~~~

if ($eventKey == 'request_uri') {
	// problem with markdown relative links when on index page without "index" in the uri.
	// to minimize the redirects, when code templates and pages use link as "index" instead of '/' etc
	if (is_dir(CONTENT_DIR . $data['uri'])) {
    	$base_url =  \Phile\Utility::getBaseUrl();
    	$needseperator = '/'; 
    	$needseperator2 = '/';
    	//if top level copntent folder index uri, don't need seperator
    	if($data['uri'] == '') { $needseperator = ''; }
    	if(substr($data['uri'], -1) === '/') { $needseperator2 = ''; }
    	$redirect_url = $base_url .$needseperator. $data['uri'].$needseperator2.'index';
    	\Phile\Utility::redirect($redirect_url, 302);
    die();
	}
}
~~~~

## EXCERPTS Cleanup

My search plugin uses an excerpt tag to mark the end of an excerpt.  Occasionally this tag does not get removed and appears in output.  So before final rendering of the content, just check and make sure the tag got removed.  Uses `template_engine_registered` event.

~~~~
	//    remove the [[#ENDSUMMARY]] tag if in the current URI
	$data['data']['content'] = str_replace('[[#ENDSUMMARY]]', '', $data['data']['content']);
~~~~

