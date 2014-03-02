/*
title: The Request URI Problem
date: 2013-11-10
*/

If your url uas any request ($_GET) variables, the URI does not seem to be parsed correctly and you get a 404.

I modified the core to strip the querystring from the uri.

File: Lib\Phile\Core.php

[[#ENDSUMMARY]]

~~~~

protected function initCurrentPage() {
	$uri    = $_SERVER['REQUEST_URI'];
	$uri    = str_replace('/' . \Phile\Utility::getInstallPath() . '/', '', $uri);
                
         // Strip query string
         // jacmgr $data['uri'] is not changeable in plugin, so modify here......
        $uri = preg_replace('/\?.*/', '', $uri); // Strip query string
                
                
	/**
	* @triggerEvent request_uri this event is triggered after the request uri is detected.
	* @param uri the uri
	*/
	Event::triggerEvent('request_uri', array('uri' => $uri));

	// use the current url to find the page
	// jacmgr:  Shoudl use the modified without query string
        //$page = $this->pageRepository->findByPath($_SERVER['REQUEST_URI']);
        $page = $this->pageRepository->findByPath($uri);

~~~~

