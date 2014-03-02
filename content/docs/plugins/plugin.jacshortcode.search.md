/*
Title: Search Pages Shortcode
description: Search and Excerpt Groups of Files with Pagination
pluginname: jacshortcode.search (SEARCH PAGES)
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.2
*/
[sql4array]: https://github.com/bluelovers/sql4array
Search all pages and return list based on criterea. Display the list using a twig template or internal plugin template. Templates can be linklist, csv, excerpt.  You can also create any template you want with your own names.  Templates go in the theme folder.  This plugin does everything in the plugin and merges the parsed formatted content into the `content` variable. 

    [ search  where="url LIKE '%docs/markdown%'" template="linklist"]
    
    [ search  where="url LIKE '%docs/%'" template="linklist"]
 
    [ search where="url LIKE '%docs/%'" count=3 skip=5 sort=published order=reverse template=excerpt]

    [ search pages=blog* count=5 sort=published order=reverse template=default  tplvar=result]

[[#ENDSUMMARY]]

There are some ways to do this without a plugin and just using the pages variable and twig layouts.  However, those methods don't include parsed content from the searches.

This plugin is quirky and dirty, but it gets me to a proof of concept.  I hope in the future that phile provides a robust search and filter of pages in the core.  Once that is done, I would rewrite the plugin without [sql4array][sql4array].

###Why
These are useful for showing list of pages matching your criteria, so most useful on pages like index.md.  It allows you to embed the search results in a content page.

The search content results and templates are parsed during the page preparation before the full page is parsed.

Here a sample using the markdown docs and linklist:
MARKUP:
~~~~
[ search  where="url LIKE '%docs/plugins/shortcode%'" template="linklist"]
~~~~

RESULTS:

[search  where="url LIKE '%docs/plugins/%shortcode%'" template="linklist"]

### Templates

Templates are twig.  Locate them in the themes folder.  Here is sample source for the linklist template.
Note the use of the `$result` twig variable. This is assigned by the shortcode. `$result` is the array of search results.

~~~~
<ul>		
    {% for page in results %}
			  <li><a href="{{ page.url }}">{{ page.title }}</a></li>
	  {% endfor %}
</ul>
~~~~

Here is an example of using excerpt and pagination 
~~~~
[ search  where="url LIKE '%docs/%' ORDER BY chapter ASC" count=2 template="docsexcerpt" addfields="chapter"]
~~~~
And the template
~~~~
{% for page in results %}
<div class="row">
	<div class="container xcol-md-6 xcol-sm-6">
		<article class="blog-teaser">
			<header>
				<h3><a href="{{ base_url }}/{{ page.url }}">{{ page.title }}</a></h3>
				<hr>
			</header>
			<div class="body">
				{{ page.excerpt }}
			</div>
			<div class="clearfix">
				<a href="{{ base_url }}/{{ page.url }}" class="btn btn-tales-one">Read more</a>
			</div>
		</article>
 	</div>
</div>
{% endfor %}
<!-- Begin Page Navigation -->

{% if meta.resultnext %}                 
	<div class="paging">
		{% if meta.resultstart != 0 %} <a href="?skip={{ meta.resultprevious }}" class="newer"><i class="icon-long-arrow-left"></i> Newer</a>
		{% endif %} 
		<span>&bull;</span>
		{% if meta.resultnext <=  meta.resulttotal  %} <a href="?skip={{ meta.resultnext }}" class="older">Older <i class="icon-long-arrow-right"></i></a>
		{% endif %} 
	</div>
{% endif %}

 
<!--End Page Navigation --> 
~~~~

And the result:
<div class="alert-info">
[search  where="url LIKE '%docs/%' ORDER BY chapter ASC" count=2 template="docsexcerpt" addfields="chapter"]
</div>

## To Do

Lots of stuff to do with this one.  I don't really like it, but got me to proof of concept.



