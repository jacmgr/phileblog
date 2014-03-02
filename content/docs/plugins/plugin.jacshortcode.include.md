/*
Title: INCLUDE Page Shortcode
description: Include other files in current files shortcode for Phile Markup.
pluginname: shortcodes.include (INCLUDE FILE)
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.2
*/

## Include another page in current page

Requires the shortcodes plugin to be active.

Let's say there exists another file in your site called **testinclude.md** and it has content like this:
~~~~
[include file=docs/plugins/testinclude.md raw=true]
~~~~

[[#ENDSUMMARY]]

You can include that page or any other page using the markup:

    [ include file=docs/plugins/testinclude.md]

Note that this requires using the pagename with it's extension (this case ".md").

The result of the above markup is:

[include file=docs/plugins/testinclude.md]


Basically it merges the two pages before they are passed through the parser.

### Other formats

Include php snippet

    [ include file=codesnips/samplecode.php]
    
~~~~
[include file=codesnips/sample.01.php]
~~~~

### Break a long Document to sub pages

      [ include file=docs/part1.md]
      [ include file=docs/part2.md]
      [ include file=docs/part3.md] 