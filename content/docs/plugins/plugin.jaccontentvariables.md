/*
Title: Jac Content Variables Plugin
pluginname: phileJacContentVariables
description: Add custom variables in your content before it is parsed.
version: 0.5
revisiondate: 21 OCT 2013
pluginauthor: jacmgr
author: jacmgr
chapter: plugins.1
*/

%description% . An official addon already exists; however, i needed a little more features. Primarily escaping the display of the variable names.

[[#ENDSUMMARY]]

## Escapeing Meta Tags

The changes i made could easily be incorporated into the phile official plugin if someone wants to do that.

Compared to official plugin, I did not implement the `$this->settings['open_tag']` and `$this->settings['close_tag']`. My version always assumes you are using `%`.

Added Feature:
You can escape the variable names so they appear in documentation and code blocks.  The escape character is `\`.

So this Content

	The **\%title%** is a very interesting page by **\%author%** and was last updated on **\%revisiondate%** ...

Results in substituted final content as normal phile:

> The **%title%** is a very interesting page by **%author%** and was written on **%revisiondate%** ...

And this Content with escapes
 
    The **\\%title%** is a very interesting page by **\\%author% and was last updated on **\\%revisiondate%** ...

Results in no substitution of the variables:

> The **\%title%** is a very interesting page by **\%author%** and was last updated on **\%revisiondate%** ...