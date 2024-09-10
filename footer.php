
</main>

<?php do_action( 'pekebyte_one_content_end' ); ?>

</div>

<?php do_action( 'pekebyte_one_content_after' ); ?>

<footer id="colophon" class="site-footer py-12" role="contentinfo">
	<?php do_action( 'pekebyte_one_footer' ); ?>

	<div class="container mx-auto text-center">
		&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
