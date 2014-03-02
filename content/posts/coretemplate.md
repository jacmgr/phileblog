/*
title: Tweak Twig Core Template
date: 2013-12-15
*/

Noticed that some settings that were made in plugins were not making it into template.  I tweaked the `Lib\Phile\Template\Twig.php`

[[#ENDSUMMARY]]

The `render` method is using a `$this-settings` that was defined in the constructor.  Many plugins could have added more settings since then?

Anyway, I added this and my problems went away.  Something tells me this is not the real solution.  Maybe this is even a red herring!
 
~~~~
public function render() {
    //jacmgr added this line
    $this->settings = Registry::get('Phile_Settings');  //added by jacmgr  
~~~~

