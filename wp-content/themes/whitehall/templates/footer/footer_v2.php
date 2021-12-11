<?php
/**
 * Footer Template  File
 *
 * @package WHITEHALL
 * @author  Noor Tech
 * @version 1.0
 */

$options = whitehall_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' ); ?>
	
	<!-- main-footer -->
	<footer class="main-footer">
		
		<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
		<div class="footer-top-two">
			<div class="auto-container">
				<div class="row clearfix">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<div class="footer-bottom alternat-2">
			<div class="auto-container">
				<div class="bottom-inner clearfix">
					<div class="copyright pull-left">
						<p><?php echo wp_kses( $options->get( 'copyrights_v2', '&copy; 2021 By <a href="#">Whitehall City Govt.</a> All Rights Reserved.' ), $allowed_html ); ?></p>
					</div>
					
					<?php if( $options->get('show_footer_menu_v2') ): ?>
					<ul class="footer-nav clearfix pull-right">
						<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
							'container_class'=>'navbar-collapse collapse navbar-right',
							'menu_class'=>'nav navbar-nav',
							'fallback_cb'=>false, 
							'items_wrap' => '%3$s', 
							'container'=>false,
							'depth'=>'3',
							'walker'=> new Bootstrap_walker(),
						) ); ?>
					</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
	<!-- main-footer end -->
