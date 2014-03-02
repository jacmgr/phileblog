/*
Title: GALLERY TimThumb Shortcode
pluginname: shortcodes_gallery
description: provides a shortcode markup for a gallery in Phile
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.2
*/
[timthumb]: http://www.binarymoon.co.uk/projects/timthumb/
## Images and Galleries

This shortcode is used to display individual images or galleries.  It uses [timthumb][timthumb] to create thumbnails and cache them.  If you don't need thumbnails and just want to display images, [markdown already does that without using any plugin](#markdown).  This plugin allows you to just put any image you want in the folder and specify a display size.  The plugin handles the resizing and caching.

[[#ENDSUMMARY]]

> This is still buggy, but proof of concept for me. I think there may be other shortcode gallery plugins, but I have not searched.  Future to do.

## Single Images
~~~~
    [ jactimthumb "puppy/flower1.jpg" width=300 float="left"]
~~~~
[jactimthumb "puppy/flower1.jpg" width=300 float="left"]

~~~~
    [ jactimthumb "puppy/flower3.jpg" width=200 float="right" link=true]
~~~~
[jactimthumb "puppy/flower3.jpg" width=200 float="right" link=true]

## Gallery
~~~~
    [ jacgalleryfromfolder folder=puppy]
~~~~
[jacgalleryfromfolder folder=puppy]

## Notes and Details

Timthumb is installed in a location separate from pico.  The thumbs are cached in the timthumb folders.  While you are testing, you need to clear that timthumb cache often.

The actual full size images are stored in a folder named `files` under the same folder as the content file you are viewing.  You can specify a subfolder in the shortcode as in the example above.  `puppy` really means `files\puppy`

## Markdown  {#markdown}
Markdown uses this for images. 
~~~~
![Alt text](/path/to/img.jpg "Optional title")
~~~~

So if your images are already the size you want to be on your page, you don;t need a plugin, just use markdown
~~~~
![Some nice flowers](files/puppy/flower1.jpg "Some Nice Flowers")
~~~~

![Some nice flowers](files/puppy/flower1.jpg "Some Nice Flowers")