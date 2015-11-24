<?= get_header(); ?>
<section id="content" role="main">
<article id="post-0" class="post not-found">
<header class="header">
<h1 class="title"><?= _e( 'Not Found', 'blankslate' ); ?></h1>
</header>
<section class="entry-content">
<p><?= _e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?></p>
<?= get_search_form(); ?>
</section>
</article>
</section>
<?= get_sidebar(); ?>
<?= get_footer(); ?>