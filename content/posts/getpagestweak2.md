/*
title: Getting Raw Page Data
date: 2014-01-19
*/

I tweaked the `Lib\Phile\Model\Page.php`
I needed to get the full raw text content un-parsed.  There were  no getters in the page model for that.  I added the following getters:


[[#ENDSUMMARY]]

~~~~
       //jacmgr: Get the raw content as well...
	public function getContentRaw() {
		return $this->content;
	}
	//jacmgr: Get the raw full page including meta section
	public function getRawData() {
		return $this->rawData;
	}
~~~~

