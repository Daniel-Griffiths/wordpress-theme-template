<?php 
/* only display comments for posts */
if(is_single() == 'post'){ ?>

<div id="disqus_thread"></div>

<script type="text/javascript">
    var disqus_shortname = '<?=get_option('website_disqus_username')?>';

    (function() {
        var dsq = document.createElement('script'); 
        dsq.type = 'text/javascript'; 
        dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the comments</a></noscript>
<?php } ?>