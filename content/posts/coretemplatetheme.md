/*
title: Tweak Twig Core Template Theme
date: 2013-12-18
*/
When use a meta `template` phile does not check if the template actually exists.  So it will throw an exception if it does not exist.  I would rather it simply uses the default template if the meta template is not found.

I tweaked the `Lib\Phile\Template\Twig.php`

I think I can actually make this a plugin instead of modify core, but seems like core behavior to me.

[[#ENDSUMMARY]]

Down at the bottom of the render function I added 2 lines:
 
~~~~
    $template = ($this->page->getMeta()->get('template') !== null) ? $this->page->getMeta()->get('template') : 'index';

    // added these 2 lines
    // if template does not exist, use index.
    $usetemplate = THEMES_DIR . $this->settings['theme'].'\\'.$template.'.html';
    if (!file_exists($usetemplate)) { $template = 'index'; }
   
    $output = $twig->render($template .'.html', $twig_vars);
~~~~

