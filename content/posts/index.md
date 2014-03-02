/*
Title: The jaccms blog
date: 10sep2013
LayoutEntries: index_blog
Layout: index
CommentsEntries: on
Comments: off
AuthorEntries: jacmgr
=========================
This is the index/home page for blog entries.  The LayoutEntries meta will be used for all pages in this folder.

*/

[search  where='$url contains posts/' ORDERBY='$date desc' template="blogexcerpt"  excerpts=true paginate=true count=5 skip=0 exclude=index,sidebar]

<!--
There is problem when count is used and it is greater than the number returned
-->