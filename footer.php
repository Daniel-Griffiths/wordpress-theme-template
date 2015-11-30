	</main><!-- /grid-pad -->
	<footer class="footer">
	<div class="grid">
		<div class="col-1-4">
			<?php if(is_active_sidebar('footer-widget-area-1')) dynamic_sidebar('footer-widget-area-1'); ?>	
		</div>
		<div class="col-1-4">
			<?php if(is_active_sidebar('footer-widget-area-2')) dynamic_sidebar('footer-widget-area-2'); ?>	
		</div>
		<div class="col-1-4">
			<?php if(is_active_sidebar('footer-widget-area-3')) dynamic_sidebar('footer-widget-area-3'); ?>	
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
			  Web design by <strong>Company Name</strong>
			</div>
		</div>
	</div>
	</footer>
	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= get_template_directory_uri() ?>/assets/js/lib/jquery-1.11.3.min.js"><\/script>')</script>
	<script src="<?= get_template_directory_uri() ?>/assets/js/lib/fastclick.min.js"></script>
	<script src="<?= get_template_directory_uri() ?>/assets/js/main.js"></script>
	<?php wp_footer(); ?>
</body>
</html>