/*
Title: Shortcode Plugin
pluginname: jacshortcode
description: Adds a wordpress style shortcode ability to Phile Markup.
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.2
*/

## Shortcode Plugin

Use wordpress style shortcodes in your page markup.  This plugin allows you to make other plugins to implement more shortcodes. This plugin simply loads the shortcode engine, and then processes shortcodes defined in other plugins. 

[[#ENDSUMMARY]]

Why?  Well, I don't understand regular expressions and not an advanced coder, so using shortcodes gave me an easy way to add functionality.  In fact individual plugins not using shortcodes could be easily made by someone more advanced than me.

Currently the addon processes all shortcodes in the `before_parse_content` event.

One simple shortcode is included in this plugin

Page CONTENT:
~~~~
YO! The current year is [ show_current_year], is it right?
~~~~

Results in: 

> YO! The current year is [show_current_year], is it right?

OTHER SHORTCODE PLUGINS:

* [Include another file in the current page](plugin.jacshortcode.include)
* [Search pages for a list of pages meeting your criteria and display info for all of them](plugin.jacshortcode.search)
* [Amazon ASIN Image Link](plugin.jacshortcode.amazon)
* [Show an image gallery](plugin.jacshortcode.gallery)


## Notes

I found the [shortcodes.php processor file here](http://forums.phpfreaks.com/topic/236984-wordpress-style-shortcode-function/).  It worked without any modification.

The shortcode plugin will include that file which then will control the registration of all other shortcodes you create.

~~~~

// phileJacShortcode.php
// ---------------------------------------
require_once PLUGINS_DIR.'/phileJacShortcode/lib/shortcodes.php';
// ---------------------------------------
// This plugin class must be loaded before all shortcodes.
// This is just an engine that will execute all registered shortcodes by other plugins.
// The shortcodes are executed in the hook before_parse_content
// ---------------------------------------
// The engine provides this function that the plugins use to register their shortcodes
// add_shortcode('shortcode text name', 'function to execute');
// See other files for more shortcodes and how they are registered
// ---------------------------------------
class PhileJacShortcode extends \Phile\Plugin\AbstractPlugin implements \Phile\EventObserverInterface {
	/*
	This will execute ALL registered shortcodes.
	NOTE: SHORTCODES ARE DONE BEFORE MARKDOWN......
	*/
	public function __construct() {
		\Phile\Event::registerEvent('before_parse_content', $this);
		\Phile\Event::registerEvent('after_parse_content', $this);
		
		// go and get the settings for the site
		$this->config = \Phile\Registry::get('Phile_Settings');

		//add any shortcodes in this current file. Just the sample is here.
		add_shortcode('show_current_year', array($this, 'show_current_year'));  
	}

	public function on($eventKey, $data = null) {
            
		if ($eventKey == 'before_parse_content') { 
    	    $out = do_shortcode($data['content']);
    	    $data['content'] = $out;		
		}
	}

	//Sample simple shortcode
	function show_current_year(){
    	return date('Y');
	}
}

~~~~