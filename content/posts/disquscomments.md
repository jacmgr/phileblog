/*
Title: Disqus Comments
Author: jacmgr
date: 31 October 2013
Layout: index_blog
*/

## Disqus Comments

This assumes you already have a [disqus](http://disqus.com) account and know how to set it up using the universal script they provide.

### In config.php
~~~~
$config['comments'] = true;    //set to false to disable comments
~~~~

[[#ENDSUMMARY]]

### In Layout/Template

~~~~
{% if config.comments  %}
{% if meta.comments == "on" %}
<!---   START DISQUS COMMENTS  -->
 <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'your shortnamehere'; // required: replace example with your forum shortname
        var disqus_identifier = '{{ meta.url }}';    // use meta variables
        var disqus_title = '{{ meta.title }}';       // use meta variables


        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
<!---   END DISQUS COMMENTS  -->    
{% endif %}
{% endif %}
~~~~

### Notes

No plugins; just edit your theme layout files.  On my site I use a different layout for the blog folder and the docs folder.  I set the layout to either index_blog.html or index_docs.html.  In those files I add the code above.

I suppose you could go one step further and add some meta on certain pages.  Possibly `comments: off` and then don't show comments just on that page by modifying the `{% if config.comments  %}` to be `{% if not meta.comments = 'off'  %}`

That's all for now.
