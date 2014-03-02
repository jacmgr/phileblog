/*
Title: Jaccms Zones Plugin
pluginname: jac_zones
description: Add custom zones to layouts that are page based and parsed.
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
chapter: plugins.4
*/
## ZONE PLUGIN

Templates can include **zones**.  A zone is a standard area of your template such as the sidebar, the bottom, the top.  A zone corresponds to a specific content markdown file.  So in addition to the main content being rendered, the zones will also be rendered. 

[[#ENDSUMMARY]]

The plugin actually fully parses the zone page.  That fully parsed page is not available in a normal phile pages variable.  That is why you need to identify the zones in the config.  Then the plugin parses each zone and places the output in the zones array.

For example, your layout might look like this:
~~~~
<div id=sidebar>{{ zones.side }}</div>
<div id=main> {{ content }}</div>
<div class=footer>{{ zones.bottom }}</div>
~~~~

Each zone is associated with a specific content page. Any zone you use must be listed in the config file.  For example the default template uses a zone named **side** associated with file named **sidebar.md**.

In your main config file you would need:
~~~~
// ZONES USED IN THEME
$config['zones'] = array( 
		'side' => 'sidebar', 
		'bottom' =>'bottom',
		);
~~~~

For my tales theme I have several zones:
~~~~
$config['zones'] = array( 
		'side' => 'sidebar', 
		'bottom' =>'bottom',
        'bottomleft'=>'bottomleft',
        'bottomcenter'=>'bottomcenter',
        'bottomright'=>'bottomright,
        'featured'=>'zone.featured'
        );
~~~~

So the side zone is associated with sidebar.md which is a standard md content file (not a template!).  My sidebar.md looks like this:

~~~~
[include file=sidebar.md type=raw]
~~~~

You can edit the sidebar.md and put whatever you want in it that is acceptable markup for markdown or your plugins.

## Notes
This is a temporary solution. I want the zones to be heirarchical so that if i have a sidebar.md in a subfolder, it will use that one instead of the one in the main content folder. 




