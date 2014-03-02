/*
Title: Amazon ASIN Shortcode

description: shortcode to display an Amazon ASIN product iframe in Phile
pluginname: shortcodes_amazon
version: 0.5
lastupdate: 23 OCT 2013
pluginauthor: jacmgr
Chapter: plugins.2
*/

## Displays a product from Amazon

This shortcode is used to display a product from amazon.  For example here is a book I am reading.

[linkiframeAmazon asins=1481173502] 
### Thinking Statistically by Uri Bram

This was an easy quick read.  Read it complete on the train in two hours.  If you ever had a statistics class, then read it.  My statistics was so long ago, but the book was still easy to grasp.  It is not a in depth review of mathematics of statistics, but puts the concepts back in your head.

Just 3 chapters really, three topics: [Selection Bias](#SelectionBias), [Endogeneity](#Endogeneity), and [Bayes Theorem](#Bayes).   You can simply jump to the end of the book and get the quick "**CODA**", but it only makes sense to me after reading the rest of the book.

[[#ENDSUMMARY]]

###MARKUP

~~~~
[ linkiframeAmazon asins=1481173502] 
### Thinking Statistically by Uri Bram

This was an easy quick read.  Read it complete on the train in two hours.  If you ever had a statistics class, then read it.  My statistics was so long ago, but the book was still easy to grasp.  It is not a in depth review of mathematics of statistics, but puts the concepts back in your head.

Just 3 chapters really, three topics: [Selection Bias](#SelectionBias), [Endogeneity](#Endogeneity), and [Bayes Theorem](#Bayes).   You can simply jump to the end of the book and get the quick "**CODA**", but it only makes sense to me after reading the rest of the book.
~~~~


[See more examples ...](../../urichip/readings/index)

Here is the plugin code:
~~~~
class PhileJacShortcodeAmazon extends \Phile\Plugin\AbstractPlugin implements \Phile\EventObserverInterface {

	public function __construct() {
		//register the shortcode in phileJacShortcode.php do_shortcode.
		//This function will be executed by jacshortcode.php plugin
		//this format for functions that are in an object
		add_shortcode('linkiframeAmazon', array($this, 'funcIframeAmazon'));   
	}
        
	//each plugin extending plugin\AbstractPlugin MUST have an "on" Method, even if does nothing
	public function on($eventKey, $data = null) {
		//do nothing for this shortcode
	}

	// The shortcode function registered in constructor.
	public function funcIframeAmazon($atts, $content = null) 
	{
		$args = shortcode_atts( array(
			'asins' => '',
			), 
			$atts );
        
		$htmlout = '<iframe src="http://rcm.amazon.com/e/cm?lt1=_blank&bc1=000000&IS2=1&npa=1&bg1=FFFFFF&fc1=000000&lc1=0000FF&t=urichip-20&o=1&p=8&l=as1&m=amazon&f=ifr&ref=tf_til&asins='.$args['asins'].'" style="float:left;width:120px;height:240px; margin-right: 10px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>';

		return $htmlout;
	}        
}
~~~~