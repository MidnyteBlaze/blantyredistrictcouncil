<?php 
/* Template Name: Coming Soon Page */ 
/**
 * @package WHITEHALL
 * @author  ThemeKalia
 * @version 1.0
 */
?>
<?php 
get_header('coming_soon');
$data  = \WHITEHALL\Includes\Classes\Common::instance()->data( 'single' )->get(); ?>
<?php while ( have_posts() ): the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer('coming_soon'); ?>
