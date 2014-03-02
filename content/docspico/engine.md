/*
Title: The jaccms Engine
Description: How jaccms process a page load
Chapter: 0.3
*/
## A walk thru the jaccms engine

The basic process is relatively simple.  From the url entered, find the content file, load it, parse it and display it using a layout from the theme.  That's it in a nutshell.
 
### .htaccess

Routes all urls to index.php

### index.php
* Sets up the DEFINED CONSTANTS
* Loads the classes for the markdown parser
* Loads the classes for TWIG template processor. 
* Loas the the jaccms class file 
* Initiates a new jaccms object

That's it. Everything else happens in the constructor of the jaccms class which will ultimately echo the full page out.

### jaccms __constructor

The jaccms constructor processes the page and at the end outputs the page content directly.

#### Loads the settings
Some defaults are determined within the class, but the config file will control all settings.
Internally the configs become `$this->settings[]`.

#### Load the plugins
The plugins should be located in the plugins folder.  Plugins are loaded alphabetically.  If you need a specific plugin loaded early than other plugins, you can use subfolders like `plugins/_a/`, or some other scheme.

The config file must identify all the plugins you want to use. You can activate or deactivate with a true/false setting.

    ## PLUGINS ACTIVE
    $config['plugins'] = array(
			'jacmgr_plugin'=>false,    //some alterations to pages array.
			'at_navigation'=>true,    //provides a navigation menu for sidebars
			...
			);

Any plugin in the list with a state of **true** will be loaded.  If the file also has a class name that matches the filename then the class is also initiated.

Internally jaccms stores a reference to all loaded plugins in `$this->plugins`

#### Run the first hooks
Now jaccms injects some data into the plugins that have asked for it.  The first hook simply indicates the plugins are loaded. No data is passed to plugins.  The second hook indicates the config is loaded and passes the config array to the plugins.

Plugins may add or change the settings array.

>	   $this->run_hooks('plugins_loaded');
>		 $this->run_hooks('config_loaded', array(&$this->settings));

#### The request URL

Determines the current page url, the url is only the portion after the content folder. i.e. `docs/engine`.

The url is provided to the plugins with the next hook

>     $this->run_hooks('request_url', array(&$url));

Some plugins then check the url and hijack the program to display content; such as, rss feed, or sitemapxml. Explore the plugins to see what can be done.

#### The actual filename of page
* Get the file page name path with extension
* if url is empty, set it to the index page.

>  Maybe move this to later in the process.

#### Initialize the view processor		

The view processor is set as either TWIG or PHP in the config file ($this->settings).  The `view_register` method handles both template engines. Internally to jaccms and plugins the `$viewproc` object method names and parameters are the same regardless of the template engine.

>	   $this->run_hooks('before_view_register');
>	   $viewproc = $this->view_register($this->settings);
>	   $this->run_hooks('after_view_register', array( &$viewproc));

#### Setup the page database

Build a list of all pages in the site.  This is done on every page load.  
> Future will cache this step and make it an object with some methods for finding specific pages and meta data

Original pico also stored in the array the complete parsed page content and an excerpt of the content.  These elements are NOT part of the jaccms pages array. For now, jaccms gets page content and parses it only when specifically requested.

The step uses the $this->pages_getpages() method.  It builds the array and all meta data for each page.  There is also a hook in the method that is run for each page in the array. This is a plugin chance to modify the page data array.

>      $this->run_hooks('get_page_data', array(&$data, $page_meta));

(Also keeps the pico method of getting a previous page and next page.  I plan to remove this once the pages object has more methods. This prev/next should not be part of core, they could be plugin in future with full pagination.)

Once the pages data array is built, there is the plugin hook to inject it into the plugins.

>     $this->run_hooks('get_pages', array(&$pages, &$current_page, &$prev_page, &$next_page));

#### Load the current Page

We got the filename of the page above, it has not been passed to any plugin yet.  Give thge plugins a chance before we load this file.  Then load the raw content and give the plugins another chance. 

If the file does not exist, set up the 404 page load for files not found.  The 404 setup also has before and after plugins.

>~~~~
		$this->run_hooks('before_load_content', array(&$file));
		if(file_exists($file)) {
			$content = file_get_contents($file);
		} else {
        .... SETUP THE 404 header............
		}
		$this->run_hooks('after_load_content', array(&$file, &$content));
~~~~

#### Parse out the current page data (meta / front matter)

Load up the page data for current page.  This is done in the `read_file_meta()` method.  That method also runs the hook
>       $this->run_hooks('before_read_file_meta', array(&$headers)); 

`read_file_meta()`  returns a page_data array and then the hook to inject the current page data array into the plugins.
 
>     $page_data =  $this->read_file_meta($file, $content);
>     $this->run_hooks('file_meta', array(&$page_data));

#### Parse the content section

Parse the content.  There are basically 3 steps in the `parse_content` method.

* Strip the page data section (front matter) from the content.
* Perform variable substitution on the content
* Perform the markdown parse

As always give plugins a before and after shot at modifying something.

>     $this->run_hooks('before_parse_content', array(&$content)); 
>     $content = $this->parse_content($content, $page_data, $this->settings['allowed_pagevars']);
>     $this->run_hooks('after_parse_content', array(&$content)); 

#### Prepare the Layout

* First step is assigning all the variables to pass to the view processor. 
* Process any ZONES that were defined in the config or by plugins and add the zone output as view variables.
* render the current page using the default or page specific layout.
* Give the plugins a before and after shot at the rendered output.

>     $layoutName = $this->settings['theme']['defaultlayout'];
>     if (isset($page_data['layout'])) $layoutName = $page_data['layout'];
>
>		$viewproc_vars = array(
>			...
>			'layout_name' => $layoutName,
>			'meta' => $page_data,
>			'content' => $content,
>			'pages' => $pages,
>			...
>		);
>
>		$this->run_hooks('before_render', array(&$viewproc_vars, &$viewproc));
>		$zones = $this->get_zones($this->settings['zones'], $viewproc_vars, $viewproc, $pages);	
>		$viewproc_vars['zones'] = $zones;
>		//Do the layout rendering.... handles php and twig
>		$output = $viewproc->render($viewproc_vars['layout_name'], $viewproc_vars);
>		$this->run_hooks('after_render', array(&$output));
		
#### Finished !!

That's it, echo the `$output` and exit the constructor; The page is done and displayed

>     echo $output;
