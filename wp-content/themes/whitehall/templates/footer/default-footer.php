<?php
/**
 * Footer Template  File
 *
 * @package WHITEHALL
 * @author  Noor Tech
 * @version 1.0
 */

$options = whitehall_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$footer_logo = $options->get( 'footer_logo_v1' );
$footer_logo = whitehall_set( $footer_logo, 'url', WHITEHALL_URI . 'assets/images/footer-logo.png' ); ?>
	
	<!-- main-footer -->
	<footer class="main-footer">
		<?php if( $options->get('show_footer_top_v1') ): ?>
		<div class="footer-top">
			<div class="auto-container">
				<div class="top-inner">
					<div class="row clearfix">
						<div class="col-lg-3 col-md-6 col-sm-12 logo-column">
							<figure class="footer-logo"><a href="index.html"><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Logo', 'whitehall'); ?>"></a></figure>
						</div>
						
						<?php if( $options->get('show_footer_newsletter_v1') ): ?>
						<div class="col-lg-5 col-md-6 col-sm-12 text-column">
							<div class="text">
								<h3><?php echo wp_kses( $options->get( 'footer_newsletter_title_v1' ), $allowed_html ); ?></h3>
								<P><?php echo wp_kses( $options->get( 'footer_newsletter_text_v1' ), $allowed_html ); ?></P>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 form-column">
							<form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="post" class="postcode-form">
								<div class="form-group">
									<input type="hidden" id="uri8" name="uri" value="<?php echo esc_attr( $options->get( 'footer_newsletter_id_v1' ) ); ?>">
									<input type="text" name="postcode" placeholder="<?php esc_attr_e('Your email address...', 'medicoz'); ?>" required="">
									<button type="submit"><?php esc_html_e('Submit', 'whitehall'); ?></button>
								</div>
							</form>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
		<div class="widget-section footer-top-one">
			<div class="auto-container">
				<div class="row clearfix">
					<?php dynamic_sidebar( 'footer-sidebar' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="bottom-inner clearfix">
					<div class="copyright pull-left">
						<p><?php echo wp_kses( $options->get( 'copyrights_v1', '&copy; 2021 By <a href="#">Whitehall City Govt.</a> All Rights Reserved.' ), $allowed_html ); ?></p>
					</div>
					
					<?php if( $options->get('show_footer_menu_v1') ): ?>
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
    