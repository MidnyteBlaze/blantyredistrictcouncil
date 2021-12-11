<?php
/**
 * Single Post tags File.
 *
 * @package WHITEHALL
 * @author  ThemeKalia
 * @version 1.0
 */

?>
<?php $tags = wp_get_post_tags( get_the_ID() );
$get_tags   = get_the_tag_list( get_the_ID() );
?>
<?php if ( has_category() || $get_tags ) : ?>
	<div class="tags-area">
		<?php if ( $get_tags ) : ?>


			<span><i class="fa fa-tags"></i><?php esc_html_e( 'tags:', 'whitehall' ); ?></span>

			<ul>

				<?php foreach ( $tags as $tag ) : ?>

					<li>
						<a href="<?php echo esc_url( get_tag_link( whitehall_set( $tag, 'term_id' ) ) ); ?>"><?php echo esc_html( whitehall_set( $tag, 'name' ) ); ?></a>
					</li>

				<?php endforeach; ?>

			</ul>
		<?php endif; ?>
		<?php if ( has_category() ) : ?>
			<div class="cat-area">

				<span><i class="fa fa-list-alt"></i><?php esc_html_e( 'categories:', 'whitehall' ); ?></span>

				<ul>

					<li><?php wp_kses( the_category( ' , ' ), true ); ?></li>

				</ul>

			</div>
		<?php endif; ?>

	</div>
<?php endif; ?>