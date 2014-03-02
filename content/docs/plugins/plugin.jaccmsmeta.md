/*
Title: Jaccms Meta Data Plugin
author: jacmgr
==================
pluginname: phileJacCmsMeta
description: Added features for Meta Data Use
version: 0.5
revisiondate: 21 JAN 2014
pluginauthor: jacmgr
==================
chapter: plugins.1
*/

%description% . Basically adds these features to Meta Data

* if no title makes title the same as filename
* add filename to page meta
* convert any "date" named meta to a unix time stamp
* Adds Hierarchical Meta to folder and subfolder content pages.

[[#ENDSUMMARY]]

## Heirarchical Meta

On `index` pages you can define hierarchical Meta to be *assigned to ALL PAGES IN THE FOLDERS AND SUBFOLDERS* whenever those pages do NOT HAVE the same meta set.  Currently supports these values on index pages.

index meta tag | Entry Pages Meta Tag
-------------|-----------
authorentries| author
templateentries | template
layoutentries |layout
commentsentries | comments
robotsentries | robots

## EXAMPLE on PLUGIN INDEX
~~~~
Title: Documentation Home
Description: Using Phile CMS. Documentation for phile cms plugins and developers with a flat file database.
Author: jacmgr
chapter: 0
LayoutEntries: index_docs
Layout: index
CommentsEntries: on
Comments: off
robotsEntries: follow index
~~~~

All pages in the docs folder that do not set the meta will have default values of:

* author of jacmgr, '
* a layout of index_docs, 
* comments will be on, and 
* robots will be follow index.

With this plugin,  I can have content files without any meta data at all in the file. (since title will become filename.). In reality I can just use title meta.

> Note in example above, all child and sibling pages get a default comments on and a template of index_docs, but the actual index page itself is overridden with its own comment and layout meta.

