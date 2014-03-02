/*
Title: Wikitten - the wikitten tree
pluginname: wikitten_tree
description: Tree Menu and breadcrumb from wikitten
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.1.5
==================
*/
[wikitten]: http://wikitten.vizuina.com/
This is a navigation tree from [wikitten][wikitten].

* Provides a breadcrumb that matches the wikitten theme.
* Provides a toggle source button in the breadcrumb.

[[#ENDSUMMARY]]

Usage
-----

In your Layouts you have access to these variables, which are already fully rendered by the plugin. Just echo them.

~~~~
TWIG:
{{ wikitten.breadcrumb }}
{{ wikitten.tree}}
~~~~

##Javascript and CSS

The javascript for the plugin is self contained in the plugin.

The CSS you will need to add into your layout. Look at wikitten original for the CSS
~~~~
#tree-filter-query {
    display: block;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    height: 30px;
    width: 100%;
    font-size: 12px;
}
#tree-filter-query:focus,
#tree-filter-query.active {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #7B848C;
}
#tree-filter-clear-query {
    float: right;
    margin-top: -35px;
    margin-right: 5px;
    cursor: pointer;
}
#tree-filter-results li a:focus:before,
#tree li a:focus:before {
    content: "?";
    float: left;
    margin-left: -13px;
    font-weight: bold;
    color: #333;
}
~~~~

##NOTES
1. I really bastardized the original code to do this by repetitive trial and error to get the pages array converted to a form that wikitten was using.  The [original in wikitten][wikitten] is pretty nice, but I don't recommend using my code. My code is junk even though it generally proves the concept.  Find a better way to do a menu tree please. 

2. What I am looking for is a robust array search/filter for the pages array.  Once that function is available, many things will be possible to replace this.

3. I primarily use this tree because during development I want to be able to see all the pages in my site.  For an actual blog or some other sites, would not be using a full tree.


