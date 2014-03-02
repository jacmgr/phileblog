/*
Title: Themes, Layouts, Templates
Author: jacmgr
chapter: 6

See this page for maybe automating anchor menu http://stackoverflow.com/questions/12629366/auto-named-anchors-in-markdown

*/

**Layout** is the overall html page code to be used for a given web page.  **Templates** are **views** for specific content segments.  For example there could be a template for displaying a list of links in the overall layout.

All together a group of layouts and templates is called a **THEME**. The default theme is called **default**. All themes are stored in the **THEMES** folder.
You can create your own themes.  Set the theme to use in the config.php file. Templates are used from the current theme, and if they do not exist, then jaccms will try to find them in the default theme.

Templates can include **zones**.  A zone is a standard area of your template such as the sidebar, the bottom, the top.  A zone corresponds to a specific content markdown file.  So in addition to the main content being rendered, the zones will also be rendered.  Any zone you use must be listed in the config file.  For example the default template uses a zone named **side** associated with file named **sidebar.md**.  Sidebar.md is a standard md content file that looks like this:

~~~~
[include file=sidebar.md type=raw]
~~~~

You can edit the sidebar.md and put whatever you want in it.  Or remove the side zone from your template.

The layout includes these lines:
~~~~
TWIG:
{{ zones.side }}
{{ zones.bottom }}

PHP:
<? echo $zones['side'] ?>
<?php echo $zones['bottom']; ?>
~~~~

The config file includes this:

~~~~
$config['zones'] = array(
				'side' => 'sidebar', 
				'bottom' =>'bottom');
~~~~

This is a temporary solution.  The tradeoff is the original pico loads every page into the pages array with its content and parsed content.  jaccms is only loading the content of the pages listed in the zone config.  Future the templates should be able to have some function that can execute a parse a file on demand. INCLUDING all hooks involved in parseing.