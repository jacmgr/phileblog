<!--
Title: Changes to Phile Core
Date: 2013-09-12
chapter: 0.2
comments: false
-->

This page tracks the various small tweaks I made to the phile core.  See the referenced page for more information or to make comments.



## System Config/DEFINE

See [install](install).  Wanted to use a shared system folder for multiple sites. Files changed:

* index.php
* <s>lib\Phile\Core.php</s>

## Proper link URLS
* don't use the base tag from the head section of the templates
* use base_url explicitely in templates. i.e. 
~~~~
    <li><a href="{{ base_url }}/{{ page.url }}">{{ page.title }}</a></li>
~~~~

This is related to the [problem of subfolder](plugins/plugin.jaccms) links in markdown on index or excerpt pages

## The Request URI

See [blog post](/posts/requesturi).  This is likely to be fixed in the main phile core, but until it is I have a minor tweak.

Note I think there should be more changes.  I have plans in future for virtual pages and avoiding 404. To do that Need ability for plugin to change the uri.

## The Pages Model

I've made 2 changes in the Pages model.

### 1) Added some getters

See the [blog post](/posts/getpagestweak2).

Files Changed:

* Lib\Phile\Model\Page.php

I needed to get the full raw text content un-parsed.  There were  no getters in the page model for that.  I added the following getters, `getContentRaw()` and `getRawData()`.

### 2) Added a setter for Meta
See the [blog post](/posts/getpagestweak3).

I needed to be able to set meta data into a page.  There were  no setters in the page model for that.  I added the following setters, `setMeta($key, $value)'.

## Twig and Phile Settings

I made 2 changes in the TWIG object.

Files Changed:

* Lib\Phile\Template\Twig.php

### 1) Phile Settings
See the [blog post](/posts/coretemplate). Noticed that some settings that were made in plugins were not making it into template.

The `render` method is using a `$this-settings` that was defined in the constructor.  Many plugins could have added more settings since then?

Anyway, I added this and my problems went away.  Something tells me this is not the real solution.  Maybe this is even a red herring!

### 2) Added a template exist check
See the [blog post](/posts/coretemplatetheme). When use a meta `template` phile does not check if the template actually exists.  So it will throw an exception if it does not exist.  I would rather it simply uses the default template if the meta `template` is not found.

I think I can actually make this a plugin instead of modify core, but seems like core behavior to me.

## Utility for Printnice

See [blog post](/posts/printnice).  Just added a method to the utility class.  Maybe there is a way to make a plugin utility class that is accessible from any other plugin.  But this is the simplest and easy way for myself.

Files changed:

* lib\Phile\Utility.php
