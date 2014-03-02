/*
Title: A Quick Start
Author: jacmgr
chapter: 0.1

See this page for maybe automating anchor menu http://stackoverflow.com/questions/12629366/auto-named-anchors-in-markdown  

*/
This is basically pico and this documentation is adapted from pico.    I have added things specific to my changes for my system.  This documentation is mostly for myself, but feel free to do what you want with it.

[Installing](#installing) | [Content](#yourcontent) | [Page Data](#frontmatter) | [Variables](#variables) | [Markup](#markup) | [Templates](#templates) | [Plugins](#plugins) | [More](#more)

## Installing  {#installing}
  
[Install](install) has complete instructions.  The short answer is [download](%base_url%/downloads) and unzip to a folder or sub-folder. That's it, your done. Go to http://yourwebsite/yourfolder and jaccms will fire up with the default content.
<!-- 
Note difference in links in the paragraph above.  install is in the same folder, so don't need anything except file name.  Downloads in is the folder above the docs folder so need to put full url to the file.

-->
## Your Content <small>[top](#top)</small> {#yourcontent}

There is no database.  All content is stored in text files that represent one page per file.  All content is in the **content** folder of your site.
Files can be nested in folders and sub-folders. The content files must have an extension ".md".

So for a quick start copy a set of your markdown files into the content folder and see how jaccms reacts. The default jaccms template will create a tree structure of your content.

It is suggested that each folder and sub-folder have one file named **index.md**.  The default jaccms template will create a tree structure of your content.
<table class="table table-bordered">
	<thead>
		<tr><th>Physical Location</th><th>URL</th></tr>
	</thead>
	<tbody>
		<tr><td>content/index.md</td>    <td>/<br>/index</td></tr>
		<tr><td>content/about.md</td>      <td>/about</td></tr>
		<tr><td>content/subfolder/index.md</td>   <td>/subfolder<br>/subfolder/index</td></tr>
		<tr><td>content/subfolder/page.md</td><td>/sub/page</td></tr>
		<tr><td>content/blog/october2013/1.md</td><td>/blog/october2013/1</td></tr>
	</tbody>
</table>

If a file/page cannot be found, the file `content/404.md` will be shown.

## Page Data <small>[top](#top)</small> {#frontmatter}
jaccms uses **page data** formatted at the top of your markdown file.  Some people refer to this as **front matter**.  Front matter includes any type of variable you want with one variable per line using a format like **variable name: variable value**.  It is not required, but you should at least include a **title** variable.  

    /*
    Title: Docs Folder Index
    Author: jacmgr
    chapter: 0
    */
    
If you don't have a title variable, jaccms will use the filename as a title variable.
For a simple site, you may not need any page data, but once you want some additional functionality, page data will be
invaluable for sorting pages, finding pages, determining layouts, and much more.  This data can be used within your markdown pages, or by various plugins, in your templates, and other interesting uses.

The page data is available in your markdown content as

    \%title%
    \%author%
    \%whateverNameYouWant%

The page data is available in your templates as shown below.  They will always be lowercase regardless of what you enter in the page data section

    (TWIG) {{ meta.varaiablename }}   {{ meta.author }} etc...
    (PHP)  $meta['variablename']  $meta['author'] etc....

I am considering changing the `$meta` to `$pagedata`

You can [learn more about the page data variables](frontmatter).

## Config/Settings and Variables <small>[top](#top)</small> {#variables}

The main config file is in the root jaccms folder. You can override the default settings and add custom custom settings simply by editing the config.php file.

Some config variables are also available in your content and template files.  In template files these config variables are available:

<div class="alert">

Put array of available configs here

</div>

In your CONTENT markdown these configs are available:

<div class=alert>

Put array of available configs here fro CONTENT ARRAY

</div>

You can [learn more about the config variables](variables).

## Markup <small>[top](#top)</small> {#markup}

Markup is primarily using [Markdown Extra](markdown).  However additional markup specific to jaccms can be used.  For example the variable replacements discussed above.  Plugins may also provide additional types of markup.  Finally, you can always use HTML with markdown. 

The sequence of parsing is:

* Variable replacements
* Possible plugin processing
* Markdown processing
* Possible plugin post processing.

Read more about [how jaccms process a page](engine).

## Theme, Layouts, Templates  <small>[top](#top)</small> {#templates}

**Layout** is the overall html page code to be used for a given web page.  **Templates** are **views** for specific content segments.  For example there could be a template for displaying a list of links in the overall layout.

All together a group of layouts and templates is called a **THEME**. The default theme is called **default**. All themes are stored in the **THEMES** folder.
You can create your own themes.  Set the theme to use in the config.php file. Templates are used from the current theme, and if they do not exist, then jaccms will try to find them in the default theme.

Templates can include **zones**.  A zone is a standard area of your template such as the sidebar, the bottom, the top.  A zone corresponds to a specific content markdown file.  So in addition to the main content being rendered, the zones will also be rendered.  Any zone you use must be listed in the config file.  For example the default template uses a zone named **side** associated with file named **sidebar.md**.  Sidebar.md is a standard md content file that looks like this:

~~~~
[include file=sidebar.md type=raw]
~~~~

You can edit the sidebar.md and put whatever you want in it.  Or remove the side zone from your template.

You can use different layout for a given page by including a layout page data variable on a specific page.
You can also use the index.md file page data to set a layout for _all pages_ and subfolders in a specific folder.
For example, in my content/blog/index.md file use the following page data:

    / *
    Title: Blog Index
    LayoutFolder: index_blog     // use for all siblings and childeren pages in this folder
    Layout: default              // override for this page (index.md) to use default.php
    * /

[Read more about themes, templates, and zones](themes).


## Plugins  <small>[top](#top)</small> {#plugins}
Plugins can be used to add additional markup, or add additional features to jaccms.  The plugin system is essentially the same as pico with some modification.  <s>jaccms requires the plugins you want to use to be listed in your config.php file and set to active or not active.  That means you can turn off a plugin just by editing the config file.  You do not have to remove it from the plugin folder.</s>

The plugins are bundled with the jaccms download.  [You can see the full list here](plugins).  Don't forget, you activate them in the config.php file.  Not all are active by default. For example the following are inactive by default: AUTH.

##WHAT'S NEXT  <small>[top](#top)</small> {#more}

* Read about the [CONFIG.PHP File](configuration).
* The [list of plugins](./plugins)
* Using [view templates](themes)

## Documents in DOCS Folder

The format template could incorporate tree and indent.  The point is, formatting is in the template.

> For now focus on getting a series of documentation articles up to speed; install, config, add content

[search  where="url LIKE '%docs/%' ORDER BY chapter ASC" addfields=chapter template="linklist"]
