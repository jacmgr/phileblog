/*
Title: A Mini Auth Plugin
description: Method of using Authorizations login and logout
pluginname: jacminiauth
version: 0.5
revisiondate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.6
*/
Provides a simple autherization for one user. The plugin provides a method for one user to login and logout.  Other plugins or templates use this info to authorize their own actions.

[[#ENDSUMMARY]]

Install
-------
Open the `jacminiauth_config.php` file and insert your **sha1 hashed password**.  I could put that in the config.php, but I wanted to keep it seperate from the Phile Settings.

How it works
------------

### Login
Miniauth hijacks the url when the url is `/login`.  There is a dummy page named login.md but no content is in it.  The content and forms are provided in the plugin.   When you submit the form, the plugin checks the password.  If the password matches, a session variable and some $settings/$configs variables are set to true:

* Uses Session Class to store a logged in status in Session
 *          \Phile\Session::set('phile_logged_in', true);
 *          \Phile\Session::set('phile_logged_in', false);
* Also puts status in the config/settings registry
 *          $this->settings['auth']['admin'] = false/true;
 *          $this->settings['auth']['loggedin'] = false/true;
* Use a page login.md and logout.md  These pages must exist.
 * FUTURE:  Should be able to make thse virtual pages with no physical page
 * Could not get redirect properly working, so stay on login/logout page.
* Default password is in the plugin folder file jacminiauth_config.php
 * Password NOT put in session or configs

### Authorized Actions

On each page load, the plugin checks the session variable. If the user is logged in, then the auth settings are set to true. Otherwise the auth settings are set to false.

In your templates or plugins you can check the auth settings in the Session or the settings variables to determine if user is logged in. The default layout uses that method to put the links for Login/Logout.

~~~~
TWIG:		
{% if config.auth.loggedin %} <a href="{{ base_url }}/logout">Logout</a> {% endif %}
{% if not config.auth.loggedin %} <a href="{{ base_url }}/login">Login</a> {% endif %} 
~~~~

### Logout
Miniauth hijacks the url when the url is `/logout`.  There is a dummy page named logout.md. MinAuth simply sets the auth variables to false, destroys the session and redirects to the index page.
			
References
----------

See [pico editor plugin](https://github.com/gilbitron/Pico-Editor-Plugin).  The auth method was basis for amini_auth.  The editor was not used.
