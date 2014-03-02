/*
title: Tweak the Pages Model
date: 2014-01-15
*/

I tweaked the `Lib\Phile\Model\Page.php`

Some plugins wanted to use the trigger `before_parse_content`. And I was confused by the process as shown here:


[[#ENDSUMMARY]]

~~~~
public function getContent() {

    Event::triggerEvent('before_parse_content', array('content' => $this->content, 'page' => &$this));

    $content = $this->parser->parse($this->content);

    Event::triggerEvent('after_parse_content', array('content' => &$content, 'page' => &$this));
return $content;
~~~~

The after parse content lets you modify `$content` in the plugin, but the before parse content does not let you modify `$content`. 

So I modified the line for before_parse_content to follow after_parse_content

~~~~
public function getContent() {

    Event::triggerEvent('before_parse_content', array('content' => &$this->content, 'page' => &$this));

    $content = $this->parser->parse($this->content);

    Event::triggerEvent('after_parse_content', array('content' => &$content, 'page' => &$this));
return $content;
~~~~


.... There is another way...... 
