	</main><!-- /grid-pad -->
	<footer class="footer">
	<div class="grid">
		<div class="col-1-4">
			<h3>Footer Title</h3>
		  	<p>Morbi vitae euismod sem, at iaculis ipsum. Morbi lobortis elementum sapien at pellentesque. Sed in vestibulum purus. Praesent molestie quis ligula ut dignissim. Aliquam eget ante sem. Sed commodo sagittis ante, id rhoncus neque blandit</p> 
		</div>
		<div class="col-1-4">
			<h3>Footer Title</h3>
		  	<p>Morbi vitae euismod sem, at iaculis ipsum. Morbi lobortis elementum sapien at pellentesque. Sed in vestibulum purus. Praesent molestie quis ligula ut dignissim. Aliquam eget ante sem. Sed commodo sagittis ante, id rhoncus neque blandit </p>
		</div>
		<div class="col-1-4">
			<h3>Footer Title</h3>
		  	<p>Morbi vitae euismod sem, at iaculis ipsum. Morbi lobortis elementum sapien at pellentesque. Sed in vestibulum purus. Praesent molestie quis ligula ut dignissim. Aliquam eget ante sem. Sed commodo sagittis ante, id rhoncus neque blandit </p>
		</div>
		<div class="col-1-4">
			<h3>Company Details</h3>
		  	<p><?php if(!empty( get_option('website_company_address'))) echo nl2br(get_option('website_company_address')); ?></p>
		</div>
	</div>
	<div class="bottom">
		<div class="grid">
			<div class="col-1-2">
			  Copyright &copy; <?= date('Y') ?>
			  <?php if(!empty( get_option('website_company_name'))) echo get_option('website_company_name'); ?>
			</div>
			<div class="col-1-2 made-by">
			  Web design by <strong>BLANK</strong>
			</div>
		</div>
	</div>
	</footer>
	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= get_template_directory_uri() ?>/assets/js/lib/jquery-1.11.3.min.js"><\/script>')</script>
	<script src="<?= get_template_directory_uri() ?>/assets/js/main.js"></script>
	<?php wp_footer(); ?>
</body>
</html>