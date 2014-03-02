/*
Title: OLD DOCUMENTATION
Author: jacmgr
LayoutEntries: index_docs
Layout: index
chapter: 0
CommentsEntries: off
Comments: off
RobotsEntries: noindex nofollow
Robots: johnnydee

See this page for maybe automating anchor menu http://stackoverflow.com/questions/12629366/auto-named-anchors-in-markdown  

*/

> These pages are old and written for PICO, not phile.  I keep them here as reference for myself.  After I have good enough docs for PHILE, I will delete these docs
>

[pico]: http://pico.dev7studios.com
[wikitten]: http://wikitten.vizuina.com/

jaccms is basically a fork of [pico cms][pico].  I haven't altered the core pico too much, but made some changes that I couldn't do in a plugin.  Most of the plugins will also run fine in a standard pico cms site. This documentation is primarily for my own use and for my fork named *jaccms*.

Where to Start
--------------

* [A quick Start](a_quick_start)  The main overview of downloading, installing, running, the jaccms on your server.  This page has most of the links to all other main documentation pages.
* [Code Overview](engine) Narrative of the main engine code. Describes how a page is processed and rendered.
* [Pico Core Changes](picocorechanges) Narrative of what I changed in pico core
* [My Plugins](plugins) Narrative of what I changed in pico core

-----

## List all Documents

[search  where="url LIKE '%docs/%' ORDER BY chapter ASC" template="docslinklist" addfields="chapter"]

-----

## Plugin Docs Excerpts
[search  where="url LIKE '%docs/plugins/%' ORDER BY chapter ASC" template="docsexcerpt" addfields="chapter"]
