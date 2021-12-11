<?php
/**
 * Footer Main File.
 *
 * @package WHITEHALL
 * @author  ThemeKalia
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php whitehall_template_load( 'templates/footer/footer.php', compact( 'page_id' ) ); ?>
    
	<!--Scroll to top-->
	<button class="scroll-top scroll-to-target" data-target="html">
		<span class="fas fa-angle-up"></span>
	</button>

</div><!-- End Page Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
