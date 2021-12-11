<?php
$options = whitehall_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Logo
$light_logo = $options->get( 'light_logo' );
$light_logo_dimension = $options->get( 'light_logo_dimension' );

//Dark Logo
$dark_logo = $options->get( 'dark_logo' );
$dark_logo_dimension = $options->get( 'dark_logo_dimension' );

//Sticky Logo
$sticky_logo = $options->get( 'sticky_logo' );
$sticky_logo_dimension = $options->get( 'sticky_logo_dimension' );

//Mobile Logo
$mobile_logo = $options->get( 'mobile_logo' );
$mobile_logo_dimension = $options->get( 'mobile_logo_dimension' );

//Sidebar Logo
$sidebar_logo = $options->get( 'sidebar_logo' );
$sidebar_logo_dimension = $options->get( 'sidebar_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper rtl">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- preloader -->
	<div class="loader-wrap">
		<div class="preloader">
			<div class="preloader-close"><?php esc_html_e('Preloader Close', 'whitehall'); ?></div>
			<div id="handle-preloader" class="handle-preloader">
				<div class="animation-preloader">
					<div class="spinner"></div>
				</div>  
			</div>
		</div>
	</div>
	<!-- preloader end -->
	<?php endif; ?>

	<!-- main header -->
	<header class="main-header style-one">
		<?php if( $options->get('show_top_bar_v4') ) { ?>
		<!-- header-top -->
		<div class="header-top">
			<div class="auto-container">
				<div class="top-inner clearfix">
					<div class="left-column pull-left clearfix">
						<?php if( $options->get('show_weather_v4') ) { ?>
						<div class="weathre-box"><i class="flaticon-sunny-day-or-sun-weather"></i><?php echo wp_kses($options->get('weather_text_v4'), $allowed_html); ?></div>
						<?php } ?>
						
						<?php if( $options->get('show_top_menu_v4') ) { ?>
						<ul class="links-box clearfix">
							<?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'navbar-collapse collapse navbar-right',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false, 
								'items_wrap' => '%3$s', 
								'container'=>false,
								'depth'=>'3',
								'walker'=> new Bootstrap_walker(),
							) ); ?>
						</ul>
						<?php } ?>
					</div>
					<div class="right-column pull-right clearfix">
						<ul class="info-list clearfix">
							<?php if( $options->get('show_phone_number_v4') ) { ?>
							<li><i class="flaticon-phone-with-wire"></i><a href="tel:<?php echo esc_attr(phone_number($options->get('phone_number_v4'))); ?>"><?php echo wp_kses($options->get('phone_number_v4'), $allowed_html); ?></a></li>
							<?php } ?>
							
							<?php if( $options->get('show_working_hours_v4') ) { ?>
							<li><i class="flaticon-fast"></i><?php echo wp_kses($options->get('working_hours_v4'), $allowed_html); ?></li>
							<?php } ?>
						</ul>
						
						<?php if($options->get( 'show_social_media_v4' )) {
						$icons = $options->get( 'social_media_v4' );
						if ( ! empty( $icons ) ) { ?>
						<ul class="social-links clearfix">
							<?php foreach ( $icons as $h_icon ) {
							$header_social_icons = json_decode( urldecode( whitehall_set( $h_icon, 'data' ) ) );
							if ( whitehall_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', whitehall_set( $header_social_icons, 'icon' ) ); ?>
							<li><a href="<?php echo esc_url(whitehall_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(whitehall_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(whitehall_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fab <?php echo esc_attr( whitehall_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
							<?php } ?>
						</ul>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<!-- header-lower -->
		<div class="header-lower">
			<div class="auto-container">
				<div class="outer-box clearfix">
					<div class="logo-box pull-left">
						<figure class="logo"><?php echo whitehall_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
					</div>
					<div class="menu-area clearfix pull-right">
						<!--Mobile Navigation Toggler-->
						<div class="mobile-nav-toggler">
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
						</div>
						<nav class="main-menu navbar-expand-md navbar-light">
							<div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
										'container_class'=>'navbar-collapse collapse navbar-right',
										'menu_class'=>'nav navbar-nav',
										'fallback_cb'=>false, 
										'items_wrap' => '%3$s', 
										'container'=>false,
										'depth'=>'3',
										'walker'=> new Bootstrap_walker(),
									) ); ?>
								</ul>
							</div>
						</nav>
						<div class="menu-right-content clearfix">
							<ul class="other-option clearfix">
								<?php if( $options->get('show_search_v4') ) { ?>
								<li class="search-btn">
									<button type="button" class="search-toggler"><i class="far fa-search"></i></button>
								</li>
								<?php } ?>
								
								<?php if( $options->get('show_sidebar_v4') ) { ?>
								<li class="nav-box">
									<div class="nav-toggler navSidebar-button"><i class="fas fa-th-large"></i></div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--sticky Header-->
		<div class="sticky-header">
			<div class="auto-container">
				<div class="outer-box clearfix">
					<div class="logo-box pull-left">
						<figure class="logo"><?php echo whitehall_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
					</div>
					<div class="menu-area clearfix pull-right">
						<nav class="main-menu clearfix">
							<!--Keep This Empty / Menu will come through Javascript-->
						</nav>
						<div class="menu-right-content clearfix">
							<ul class="other-option clearfix">
								<?php if( $options->get('show_search_v4') ) { ?>
								<li class="search-btn">
									<button type="button" class="search-toggler"><i class="far fa-search"></i></button>
								</li>
								<?php } ?>
								
								<?php if( $options->get('show_sidebar_v4') ) { ?>
								<li class="nav-box">
									<div class="nav-toggler navSidebar-button"><i class="fas fa-th-large"></i></div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- main-header end -->

	<!-- Mobile Menu  -->
	<div class="mobile-menu">
		<div class="menu-backdrop"></div>
		<div class="close-btn"><i class="fas fa-times"></i></div>

		<nav class="menu-box">
			<div class="nav-logo"><?php echo whitehall_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
			<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
			
			<?php if( $options->get('show_mobile_menu_v4') ) { ?>
			<div class="contact-info">
				<h4><?php echo wp_kses($options->get('mobile_contact_title_v4'), $allowed_html); ?></h4>
				<ul>
					<?php if( $options->get('mobile_address_v4') ) { ?>
					<li><?php echo wp_kses($options->get('mobile_address_v4'), $allowed_html); ?></li>
					<?php } ?>
					
					<?php if( $options->get('mobile_phone_number_v4') ) { ?>
					<li><a href="tel:<?php echo esc_attr(phone_number($options->get('mobile_phone_number_v4'))); ?>"><?php echo wp_kses($options->get('mobile_phone_number_v4'), $allowed_html); ?></a></li>
					<?php } ?>
					
					<?php if( $options->get('mobile_email_address_v4') ) { ?>
					<li><a href="mailto:<?php echo sanitize_email($options->get('mobile_email_address_v4')); ?>"><?php echo sanitize_email($options->get('mobile_email_address_v4')); ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="social-links">
				<?php if($options->get( 'show_mobile_social_media_v4' )) {
				$icons = $options->get( 'mobile_social_media_v4' );
				if ( ! empty( $icons ) ) { ?>
				<ul class="clearfix">
					<?php foreach ( $icons as $h_icon ) {
					$header_social_icons = json_decode( urldecode( whitehall_set( $h_icon, 'data' ) ) );
					if ( whitehall_set( $header_social_icons, 'enable' ) == '' ) {
						continue;
					}
					$icon_class = explode( '-', whitehall_set( $header_social_icons, 'icon' ) ); ?>
					<li><a href="<?php echo esc_url(whitehall_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(whitehall_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(whitehall_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fab <?php echo esc_attr( whitehall_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
					<?php } ?>
				</ul>
				<?php } } ?>
			</div>
			<?php } ?>
		</nav>
	</div>
	<!-- End Mobile Menu -->
	
	<?php if( $options->get('show_search_v4') ) { ?>
	<!-- search-popup -->
	<div id="search-popup" class="search-popup">
		<div class="close-search"><span><?php esc_html_e('Close', 'whitehall'); ?></span></div>
		<div class="popup-inner">
			<div class="overlay-layer"></div>
			<div class="search-form">
				<?php echo get_template_part('searchform1'); ?>
			</div>
		</div>
	</div>
	<!-- search-popup end -->
	<?php } ?>

	<?php if( $options->get('show_sidebar_v4') ) { ?>
	<!-- sidebar cart item -->
	<div class="xs-sidebar-group info-group info-sidebar">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget"><i class="fal fa-times"></i></a>
				</div>
				<div class="sidebar-textwidget">
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="logo">
								<?php echo whitehall_logo( $logo_type, $sidebar_logo, $sidebar_logo_dimension, $logo_text, $logo_typography ); ?>
							</div>
							<div class="content-box">
								<h4><?php echo wp_kses($options->get('sidebar_title_v4'), $allowed_html); ?></h4>
								<div class="booking-form">
									<?php echo do_shortcode($options->get('sidebar_cf7_v4')); ?>
								</div>
							</div>
							<div class="contact-info">
								<h4><?php echo wp_kses($options->get('sidebar_contact_info_title_v4'), $allowed_html); ?></h4>
								<ul>
									<?php if($options->get('sidebar_address_v4')) { ?>
									<li><?php echo wp_kses($options->get('sidebar_address_v4'), $allowed_html); ?></li>
									<?php } ?>
									
									<?php if($options->get('sidebar_phone_number_v4')) { ?>
									<li><a href="tel:<?php echo esc_attr(phone_number($options->get('sidebar_phone_number_v4'))); ?>"><?php echo wp_kses($options->get('sidebar_phone_number_v4'), $allowed_html); ?></a></li>
									<?php } ?>
									
									<?php if($options->get('sidebar_email_address_v4')) { ?>
									<li><a href="mailto:<?php echo sanitize_email($options->get('sidebar_email_address_v4')); ?>"><?php echo sanitize_email($options->get('sidebar_email_address_v4')); ?></a></li>
									<?php } ?>
								</ul>
							</div>
							
							<?php if($options->get( 'show_sidebar_social_media_v4' )) {
							$icons = $options->get( 'sidebar_social_media_v4' );
							if ( ! empty( $icons ) ) { ?>
							<ul class="social-box">
								<?php foreach ( $icons as $h_icon ) {
								$header_social_icons = json_decode( urldecode( whitehall_set( $h_icon, 'data' ) ) );
								if ( whitehall_set( $header_social_icons, 'enable' ) == '' ) {
									continue;
								}
								$icon_class = explode( '-', whitehall_set( $header_social_icons, 'icon' ) ); ?>
								<li><a href="<?php echo esc_url(whitehall_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(whitehall_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(whitehall_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fab <?php echo esc_attr( whitehall_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php } ?>
							</ul>
							<?php } } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->
	<?php } ?>
