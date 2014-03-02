/*
title: Setting Additional Meta
date: 2014-01-24
*/

I tweaked the `Lib\Phile\Model\Page.php`

I needed to be able to set meta data into a page.  There were  no setters in the page model for that.  I added the following setters:


[[#ENDSUMMARY]]

~~~~
        //jacmgr: set some meta
        public function setMeta($key, $value) {
		$this->meta->set($key, $value);
	}
~~~~

