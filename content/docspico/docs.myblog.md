/*
Title: Details of This Site
Author: jacmgr
LayoutEntries: index_docs
Layout: index
chapter: Appendix.0

See this page for maybe automating anchor menu http://stackoverflow.com/questions/12629366/auto-named-anchors-in-markdown  

*/

The site structure is shown below.  Note that not all folders have an index.md or a sidebar.md.

* index.md besides being a page, also has meta information that is used by siblings and all childeren.  For example a layout, or a robots.  YOu don't have to put these meta on every page.

* sidebar is an example of a zone in the layout.  Zones will use the closest sibling or parent page for the zone name.  IN the structure below all pages use the same sidebar under the content folder; however, the docs folder and everything under it have a different sidebar.
~~~~
* content
 - index.md
 - about
 - other top level pages
 - sidebar
 - bottom
 * docs
 		- index
 		- gettingstarted.md
 		- other docs level pages
 		- sidebar
		* plugins
			-index.md
			-one page per plugin
		* markdown
			-some markdown docs pages
 * posts
 		- index
		* october2013
			- some post
			- another post
		* november2013
			- some post
			- another post
~~~~

