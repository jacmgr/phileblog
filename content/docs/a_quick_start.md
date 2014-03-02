/*
Title: A Quick Start
chapter: 0.1
Comments: off
*/
This is basically phile and this documentation is adapted from pico.    I have added things specific to my changes for my system.  This documentation is mostly for myself, but feel free to do what you want with it.

[Installing](#installing) | [Content](#yourcontent) | [Page Data](#frontmatter) | [Variables](#variables) | [Markup](#markup) | [Templates](#templates) | [Plugins](#plugins)

## Installing  {#installing}
  
[Setup Modifications](install) has complete instructions.  Basically I wanted to use a single core installation folder for multiple test sites.

## Content <small>[top](#top)</small> {#yourcontent}

Content is same as Phile.  I used several subfolders.  Mostly the content in the subfolders is old and for other things not related to phile.  I include them because I wanted to see how phile performs when there are lots of content files.  Currently there are about 200 content (.md) files and about 200 images. 


## Meta Data <small>[top](#top)</small> {#frontmatter}

The header **META** section is same as phile.  I added several plugins that utilize additional meta.  The biggie for me is **hierarchical meta**.  This allows me to just put meta on the index page of a subfolder and have it applied to all pages in the folder.   The second meta function i do is to internally change all meta that includes the word **date** into a php timestamp.  This gives better sorting, and allows the page meta to be set in any valid textual date format.  So even dates with different formats will still sort correctly.

See these two plugins:

* [JacCms](plugins/plugin.jaccms) and 
* [JacCmsMeta](plugins/plugin.jaccmsmeta).


## Config/Settings and Variables <small>[top](#top)</small> {#variables}

Phile allows you to put certain config variables and the meta directly into your content.  I wanted to enable automatically allowing any of the meta to be available in the content.  Also have to be able to escape the variable names so they can be used in code blocks.  I did this in the plugin [JacContentVariables](plugins/plugin.jaccontentvariables).  *My method is not as elegant as the method provided in the official phile plugin that does a similar thing!*  I am writing plugins to learn how to write plugins.

You can also see what my [config phile](configfile) looks like.


## Markup <small>[top](#top)</small> {#markup}

Markup is primarily using [Markdown Extra](markdown) provided in phile.  I created [several plugins](#plugins) to add additional markup.

* Shortcode Framework:  Adds the ability to use shortcodes markup similar to wordpress style shortcodes.  Smarter people could probaly find a more phile like way to do this.  But t was quick and dirty and works.
* Include any other content file in the current content file. This is a shortcode markup.
* Create a listing of files meeting a certain criterea and output the results using a twig template.  This is a shortcode markup.  All the index pages on this site use the shortcode.  Also the lists at the bottom of this page.
* A basic image gallery using a shortcode markup
* An amazon ASIN link using a shortcode.

## Theme, Layouts, Templates  <small>[top](#top)</small> {#templates}

Just the basic file layouts/templates.  Here are some things I did.  None required core changes.

* Simple [theme switcher](../posts/themeswitcher) using sessions. Useful for testing different themes on the same content.
* Implemented **zones** in the template.  A zone is simply a portion of the page (i.e. sidebar, bottom) that gets its content from a markdown content page. See the plugin [JacZones](plugins/plugin.jaczones)
* Experimenting with a directory tree from wikitten. See the plugin [JacWikitten](plugins/plugin.jacwikittentree).


## Plugins  <small>[top](#top)</small> {#plugins}

In addition to the plugins described above for meta data and markups, I am using a few more for authorization (login/logout), editing content files, and viewing the page sources.  See the [Plugins page](plugins) for all the plugins.

## Download <small>[top](#top)</small> {#download}

I provide a [download zip](plugins/index#downloads) of all the plugins. DO NOT USE THEM. OR USE THEM AT YOUR OWN RISK.

## Documents in DOCS Folder

[search  where="$url contains docs" ORDERBY="$chapter asc" addfields=chapter template="linklist"]
