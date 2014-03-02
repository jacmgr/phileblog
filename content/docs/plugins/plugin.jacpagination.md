<!--
Title: Pagination plugin
date: 27 February 2014
author: jacmgr
pluginname: phileJacPagination
description: Simple Pagination
version: 0.5
revisiondate: 27 February 2014
pluginauthor: jacmgr
==================
chapter: plugins.1
-->
##Testing a simple pagination

This plugin is pretty much a phile adaptation of [Pico pagination plugin,](https://github.com/rewdy/Pico-Pagination).  You use it exactly the same way.  So read that documentation.

* [My Test Page using this pagination](%base_url%/testsimplepaginator)
* [Download the plugin](http://www.jhinline.com/philecms/downloads/phileJacPagination.zip)

That is the only page in my site using this pagination. (i.e. pagination on all other pages is done using a different quirky plugin not released)

It is just proof of concept.  Use it to learn about plugins or find a better way to do it.

## Required Core.php modification

Phile does not let plugin modify a uri.  So you will get 404 when you have pages with a name like `testsimplepaginato` but you add some parameters after page name.

    testsimplepaginator/page/2

So I changed the core.php `initCurrentPage()` method From:

     Event::triggerEvent('request_uri', array('uri' => $uri));

to:

     Event::triggerEvent('request_uri', array('uri' => &$uri));

## Sample Template
~~~~
<div id="posts">
	{% for page in paged_pages %}
       <article>
          <h3><a href="{{ page.url }}">{{ page.meta.title }}</a></h3>
          <span class="post-date">Date: <em>{{ page.meta.date|date(config.date_format) }}</em></span><br>
          {# remove the formatting and limit the string to 300 characters #}
          <p>{{ page.content|striptags|slice(0, 300) }}...</p>
          <a href="{{ page.url }}" title="{{ page.title }}" class="btn">Read More</a>
       </article>
	{% endfor %}
</div>
{{ pagination_links }} 
~~~~

