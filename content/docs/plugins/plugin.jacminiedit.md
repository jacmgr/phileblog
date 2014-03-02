/*
Title: Jaccms Editor Plugin
author: jacmgr
==================
pluginname: jaccms_editor
version: 0.5
lastupdate: 23 OCT 2013
pluginauthor: jacmgr
==================
chapter: plugins.6
*/

Provides an "Page Source View" functionality.  If logged in with Mini Auth, also provides a page edit functionality.  This is essentially copied from the `wikitten` cms and tweaked to be a plugin.

Install
-------
1. Extract download an copy the "jaccms_editor" folder to your Jaccms install "plugins" folder
2. DEPENDS ON: [amini_auth plugin](plugin.amini_auth)
3. Requires jquery and codemirror css and javascripts to be loaded in your layout.  See the default theme Layout

~~~~
<link rel="shortcut icon" href="{{ theme_url }}/static/img/favicon.ico">
<link rel="stylesheet" href="{{ theme_url }}/static/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ theme_url }}/static/css/prettify.css">
<link rel="stylesheet" href="{{ theme_url }}/static/css/codemirror.css">
<link rel="stylesheet" href="{{ theme_url }}/static/css/main.css">

<script src="{{ theme_url }}/static/js/jquery.min.js"></script>
<script src="{{ theme_url }}/static/js/prettify.js"></script>
<script src="{{ theme_url }}/static/js/codemirror.min.js"></script>
~~~~

USAGE
------

Simply add `?source=true` to the end of any url.  The default layout does this by placing a button link near the top of the page content that includes  `?source=true`.

> If you are logged in by **amini_auth**, the source view page becomes a text area for you to edit the page.

References
----------

The method is based on wikitten implementation of codemirror