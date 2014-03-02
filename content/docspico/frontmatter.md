/*
Title: Page Data (front matter)
date: 10sep2013
author: jacmgr
chapter: 1
*/

This is link to [variables](variables)

## What is page data?
The page data section of every content page is at the top of the page and bracketed by the `/*` and `*/` tags.
The tags must be on their own line and start as the first character of the line. For example

    /*
    Title: Page Data (front matter)
    date: 10sep2013
    author: jacmgr
    anynameyouwant:  somevalue
    */
    ##Page Content 
    This is the **[markdown content](http://michelf.ca/)** of the page ... 
    The \%title% is a very interesting page by \%author% and was written on \%date% ...
    
Some people refer to this as "front matter".  Really it is the "data" part of the cms.  Jaccms does not use a data base, so various attributes or properties of
each content record (record) needs to be stored somewhere. So we are storing it at the front end of the page.  The page data section gets stripped out of the page
when we display the content. 

The page data can include any type of data variable you want to associate with the page. It is not required, but you should at least
include a **title** variable.  If you don't have a title variable, jaccms will use the filename as a title variable.

For a simple site, you may not need any front matter, but once you want some additional functionality, front matter will be
invaluable for sorting pages, finding pages, determining layouts, and much more.  This data can be used within your markdown pages, or by various plugins, in your templates, and other interesting uses.

The page data is available in your markdown content as

    \%title%
    \%author%
    \%whateverNameYouWant%

The page data is available in your templates and plugins as shown below.  They will always be lowercase regardless of what you enter in the page data section

    (TWIG) {{ meta.varaiablename }}   {{ meta.author }} etc...
    (PHP)  $meta['variablename']  $meta['author'] etc....

I am considering changing the `$meta` to `$pagedata`

## Common uses

Layout: somelayout
Layout
:   Use Layout: somelayout and the page will be displayed using a layout with somelayoutname.php instead of index.php

date
:  any field that includes *date* in its name will be internally converted to a unix timedatestamp.  This is useful for sorting and searching pages. Note jaccms doesn;t change `date_formatted` which is created by pico.

