<?php
function get_fontawesome_icons()
{ 
	// scrape list of icons from fontawesome css
	
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$subject = file_get_contents(get_template_directory() . '/assets/css/fontawesome-all.css');
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
	$icons = array();
	//fontawesome
	foreach($matches as $match)
	{
		$icons[] = array('value' => 'fa '.$match[1], 'label' => $match[1]);
	}
	
	//flaticon
	$et_matches = get_et_icons();
	foreach($et_matches as $match)
	{
		$icons[] = array('value' => 'icon '.$match[1], 'label' => $match[1]);
	}
	
	$icons = array_column($icons, 'label', 'value');
	//print_r($icons); exit('hellow');
	return $icons;
}
function get_et_icons()
{
	$pattern = '/\.(flaticon-(?:\w+(?:-)?)+):before\s*{\s*content/';
	$subject = file_get_contents(get_template_directory() . '/assets/css/flaticon.css');
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
	return $matches;
}

//get all categories
function get_categories_list($taxonomy='category')
{
    $options = array();
    if(!empty($taxonomy))
    {
        $terms = get_terms(
            array(
                'parent' => 0,
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            )
        );
        if (!empty($terms)) {
            foreach($terms as $term) {
                if (isset($term)) {
                    $options[''] = 'Select';
                    if (isset($term->slug) && isset($term->name)) {
                        $options[$term->slug] = $term->name.' ('.$term->count.')';
                    }
                }
            }
        }
    }
    return $options;
}

//Contact Form 7 List
function get_contact_form_7_list()
{
	$contact_forms = array();
	$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	if (!empty($cf7)) {
		foreach ($cf7 as $cform) {
			if (isset($cform)) {
				if (isset($cform->ID) && isset($cform->post_title)) {
					$contact_forms[$cform->ID] = $cform->post_title;
				}
			}
		}
	}
    return $contact_forms;
}

//Pagination
function whitehall_the_pagination2($args = array(), $echo = 1)
{
	global $wp_query;
	
	$default =  array('base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ),
					  'total' => $wp_query->max_num_pages,
					  'next_text' => '&raquo;',
					  'prev_text' => '&laquo;',
					  'type'=>'list',
					  'add_args' => false
					 );
						
	$args = wp_parse_args($args, $default);			
	
	$pagination = str_replace("<ul class='page-numbers'", '<ul class="pagination clearfix"', paginate_links($args) );
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo wp_kses_post($pagination);
		return $pagination;
	}
}
function student2_plugin_fonticons() {
	return json_decode( student2_filesystem()->get_contents( STUDENT2_PLUGIN_PATH . '/resource/fonticons.json' ), true );
	$file = wp_remote_get( get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	preg_match_all( $pattern, wp_remote_retrieve_body( $file ), $matches );
	$icons = array_combine( $matches[1], $matches[1] );
	file_put_contents( STUDENT2_PLUGIN_PATH . '/resource/fonticons.json', json_encode( $icons ) );
	return $icons;
}
function student2_filesystem() {
	require_once ABSPATH . '/wp-admin/includes/file.php';
	/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
	$creds = request_filesystem_credentials( site_url() . '/wp-admin/', '', false, false, array() );
	/* initialize the API */
	if ( ! WP_Filesystem( $creds ) ) {
		/* any problems and we exit */
		return false;
	}
	global $wp_filesystem;
	/* do our file manipulations below */
	return $wp_filesystem;
}
add_filter('whitehall_redux_custom_fonts_load', 'whitehall_redux_custom_fonts_load');
function whitehall_redux_custom_fonts_load( $custom_font ) {
	$custom_style = '';
	$pathinfo = pathinfo( $custom_font );
	if ( $filename = whitehall_set( $pathinfo, 'filename' ) ) {
		$custom_style .= '@font-face{
            font-family:"' . $filename . '";';
		$extensions   = array( 'eot', 'woff', 'woff2', 'ttf', 'svg' );
		$count        = 0;
		foreach ( $extensions as $extension ) {
			$file_path = esc_url(home_url('/')) . '/wp-content/themes/whitehall/assets/css/custom-fonts/' . $filename . '.' . $extension;
			$file_url = esc_url(get_template_directory_uri()) . '/assets/css/custom-fonts/' . $filename . '.' . $extension;
			if ( $file_path ) {
				$format = $extension;
				if ( $extension === 'eot' ) {
					$format = 'embedded-opentype';
				}
				if ( $extension === 'ttf' ) {
					$format = 'truetype';
				}
				$terminated   = ( $count > 0 ) ? ';' : '';
				$custom_style .= $terminated . 'src:url("' . $file_url . '") format("' . $format . '")';
				$count ++;
			}
		}
		$custom_style .= ';}';
	}
	return $custom_style;
}
/**
 * [whitehall_social_share_output description]
 *
 * @param  [type] $comment [description].
 * @param  [type] $args    [description].
 * @param  [type] $depth   [description].
 *
 * @return void          [description]
 */
function whitehall_social_share_output( $icon, $color = false ) {
	$permalink = get_permalink( get_the_ID() );
	$titleget  = get_the_title();
	$allowed_html = wp_kses_allowed_html( 'post' );
	if ( $icon == 'facebook' ) {
		$fb = ( $color == 1 ) ? 'style="color:#3b5998"' : '';
		?>
		<li>
			<a onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
					return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>">
				<i class="fa fa-facebook" <?php echo wp_kses( $fb, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	<?php
	if ( $icon == 'twitter' ) {
		$twitter = ( $color == 1 ) ? 'style="color:#00aced"' : '';
		?>
		<li>
			<a onClick="window.open('http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $titleget ); ?>', 'Twitter share', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
					return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $titleget ); ?>">
				<i class="fa fa-twitter" <?php echo wp_kses( $twitter, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	
	<?php
	if ( $icon == 'digg' ) {
		$digg = ( $color == 1 ) ? 'style="color:#000000"' : '';
		?>
		<li>
			<a onClick="window.open('http://www.digg.com/submit?url=<?php echo esc_url( $permalink ); ?>', 'Digg', 'width=715,height=330,left=' + (screen.availWidth / 2 - 357) + ',top=' + (screen.availHeight / 2 - 165) + '');
					return false;" href="http://www.digg.com/submit?url=<?php echo esc_url( $permalink ); ?>">
				<i class="fa fa-digg" <?php echo wp_kses( $digg, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	<?php
	if ( $icon == 'reddit' ) {
		$reddit = ( $color == 1 ) ? 'style="color:#ff5700"' : '';
		?>
		<li>
			<a onClick="window.open('http://reddit.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo str_replace( " ", "%20", $titleget ); ?>', 'Reddit', 'width=617,height=514,left=' + (screen.availWidth / 2 - 308) + ',top=' + (screen.availHeight / 2 - 257) + '');
					return false;" href="http://reddit.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo str_replace( " ", "%20", $titleget ); ?>">
				<i class="fa fa-reddit" <?php echo wp_kses( $reddit, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	<?php
	if ( $icon == 'linkedin' ) {
		$linkeding = ( $color == 1 ) ? 'style="color:#007bb6"' : '';
		?>
		<li>
			<a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( $permalink ); ?>', 'Linkedin', 'width=863,height=500,left=' + (screen.availWidth / 2 - 431) + ',top=' + (screen.availHeight / 2 - 250) + '');
					return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( $permalink ); ?>">
				<i class="fa fa-linkedin" <?php echo wp_kses( $linkeding, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	<?php if ( $icon == 'pinterest' ) {
		$pinterest = ( $color == 1 ) ? 'style=color:#cb2027' : '';
		?>
		<li>
			<a href='javascript:void((function(){var e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)})())'>
				<i class="fa fa-pinterest" <?php echo wp_kses( $pinterest, $allowed_html ); ?>></i></a>
		</li>
	<?php } ?>
	<?php
	if ( $icon == 'stumbleupon' ) {
		$stumbleupon = ( $color == 1 ) ? 'style="color:#EB4823"' : '';
		?>
		<li>
			<a onClick="window.open('http://www.stumbleupon.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo str_replace( " ", "%20", $titleget ); ?>', 'Stumbleupon', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
					return false;" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( $permalink ); ?>&amp;title=<?php echo str_replace( " ", "%20", $titleget ); ?>">
				<i class="fa fa-stumbleupon" <?php echo wp_kses( $stumbleupon, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	<?php
	if ( $icon == 'tumblr' ) {
		$tumblr = ( $color == 1 ) ? 'style="color:#32506d"' : '';
		$str    = $permalink;
		$str    = preg_replace( '#^https?://#', '', $str );
		?>
		<li>
			<a onClick="window.open('http://www.tumblr.com/share/link?url=<?php echo esc_attr( $str ); ?>&amp;name=<?php echo str_replace( " ", "%20", $titleget ); ?>', 'Tumblr', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
					return false;" href="http://www.tumblr.com/share/link?url=<?php echo esc_attr( $str ); ?>&amp;name=<?php echo str_replace( " ", "%20", $titleget ); ?>">
				<i class="fa fa-tumblr" <?php echo wp_kses( $tumblr, $allowed_html ); ?>></i>
			</a>
		</li>
	<?php } ?>
	<?php
	if ( $icon == 'email' ) {
		$mail = ( $color == 1 ) ? 'style="color:#000000"' : '';
		?>
		<li>
			<a href="mailto:?Subject=<?php echo str_replace( " ", "%20", $titleget ); ?>&amp;Body=<?php echo esc_url( $permalink ); ?>"><i class="fa fa-envelope-o" <?php echo wp_kses( $mail, $allowed_html ); ?>></i></a>
		</li>
		<?php
	}
}
add_action('whitehall_social_share_output', 'whitehall_social_share_output');

function whitehall_share_us($PostID = '', $PostName = '')
{
$options = whitehall_WSH()->option();
?>
	<?php if($options->get( 'facebook_sharing' )):?>
	<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink($PostID)); ?>" target="_blank"><span class="fab fa-facebook-f"></span></a>
	<?php endif;?>

	<?php if($options->get( 'twitter_sharing' )):?>
	<a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink($PostID)); ?>&text=<?php echo esc_attr($post_slug=$PostName); ?>" target="_blank"><span class="fab fa-twitter"></span></a>
	<?php endif;?>

	<?php if($options->get( 'linkedin_sharing' )):?>
	<a href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><span class="fab fa-linkedin"></span></a>
	<?php endif;?>

	<?php if($options->get( 'pinterest_sharing' )):?>
	<a href="https://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url(get_permalink($PostID)); ?>&description=<?php echo esc_attr($post_slug=$PostName); ?>"><span class="fab fa-pinterest"></span></a>
	<?php endif;?>

	<?php if($options->get( 'reddit_sharing' )):?>
	<a href="http://reddit.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><span class="fab fa-reddit"></span></a>
	<?php endif;?>

	<?php if($options->get( 'tumblr_sharing' )):?>
	<a href="http://www.tumblr.com/share/link?url=<?php echo esc_url(get_permalink($PostID)); ?>&name=<?php echo esc_attr($post_slug=$PostName); ?>"><span class="fab fa-tumblr"></span></a>
	<?php endif;?>

	<?php if($options->get( 'digg_sharing' )):?>
	<a href="http://digg.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><span class="fab fa-digg"></span></a>
	<?php endif;?>
<?php }

function whitehall_get_social_icons()
{
	$options = whitehall_WSH()->option();
	?>
    
    <?php $icons = $options->get( 'icons_social_share' );
		if ( !empty( $icons ) ) : ?>
		<ul class="social-box">
			<?php foreach ( $icons as $h_icon ) :
			$header_social_icons = json_decode( urldecode( whitehall_set( $h_icon, 'data' ) ) );
			if ( whitehall_set( $header_social_icons, 'enable' ) == '' ) {
				continue;
			}
			$icon_class = explode( '-', whitehall_set( $header_social_icons, 'icon' ) ); ?>
			<li><a href="<?php echo esc_url(whitehall_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(whitehall_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(whitehall_set( $header_social_icons, 'color' )); ?>"><i class="fab <?php echo esc_attr( whitehall_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php }

function whitehall_get_social_icons2()
{
	
	$options = whitehall_WSH()->option();
	?>
    
    <?php $icons = $options->get( 'icons_social_share' );
		if ( !empty( $icons ) ) : ?>
		<ul class="social-icon-three">
			<?php foreach ( $icons as $h_icon ) :
			$header_social_icons = json_decode( urldecode( whitehall_set( $h_icon, 'data' ) ) );
			if ( whitehall_set( $header_social_icons, 'enable' ) == '' ) {
				continue;
			}
			$icon_class = explode( '-', whitehall_set( $header_social_icons, 'icon' ) ); ?>
			<li><a href="<?php echo esc_url(whitehall_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(whitehall_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(whitehall_set( $header_social_icons, 'color' )); ?>"><i class="fab <?php echo esc_attr( whitehall_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php }

//Recipes Share
function whitehall_share_us_three($PostID = '', $PostName = '')
{
$options = whitehall_WSH()->option();
?>
<?php if($options->get( 'recipe_facebook_sharing' )):?>
<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink($PostID)); ?>" target="_blank"><?php esc_html_e('Facebook', 'whitehall'); ?></a>
<?php endif; ?>

<?php if($options->get( 'recipe_twitter_sharing' )):?>
<a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink($PostID)); ?>&text=<?php echo esc_attr($post_slug=$PostName); ?>" target="_blank"><?php esc_html_e('Twitter', 'whitehall'); ?></a>
<?php endif; ?>

<?php if($options->get( 'recipe_linkedin_sharing' )):?>
<a href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><?php esc_html_e('Linkedin', 'whitehall'); ?></a>
<?php endif; ?>

<?php if($options->get( 'recipe_pinterest_sharing' )):?>
<a href="https://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url(get_permalink($PostID)); ?>&description=<?php echo esc_attr($post_slug=$PostName); ?>"><?php esc_html_e('Pinterest', 'whitehall'); ?></a>
<?php endif; ?>

<?php if($options->get( 'recipe_reddit_sharing' )):?>
<a href="http://reddit.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><?php esc_html_e('Reddit', 'whitehall'); ?></a>
<?php endif; ?>

<?php if($options->get( 'recipe_tumblr_sharing' )):?>
<a href="http://www.tumblr.com/share/link?url=<?php echo esc_url(get_permalink($PostID)); ?>&name=<?php echo esc_attr($post_slug=$PostName); ?>"><?php esc_html_e('Tumblr', 'whitehall'); ?></a>
<?php endif; ?>

<?php if($options->get( 'recipe_digg_sharing' )):?>
<a href="http://digg.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><?php esc_html_e('Digg', 'whitehall'); ?></a>
<?php endif; ?>
<?php }

//Events Share
function whitehall_share_us_events($PostID = '', $PostName = '')
{
$options = whitehall_WSH()->option();
?>
<ul class="social-links clearfix">
	<?php if($options->get( 'event_facebook_sharing' )):?>
    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink($PostID)); ?>" target="_blank"><i class="fab fa-facebook-f"></i><?php esc_html_e('Facebook', 'whitehall'); ?></a></li>
    <?php endif; ?>

    <?php if($options->get( 'event_twitter_sharing' )):?>
    <li><a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink($PostID)); ?>&text=<?php echo esc_attr($post_slug=$PostName); ?>" target="_blank"><i class="fab fa-twitter"></i><?php esc_html_e('Twitter', 'whitehall'); ?></a></li>
    <?php endif; ?>

    <?php if($options->get( 'event_linkedin_sharing' )):?>
    <li><a href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><i class="fab fa-linkedin-in"></i><?php esc_html_e('Linkedin', 'whitehall'); ?></a></li>
    <?php endif; ?>

    <?php if($options->get( 'event_pinterest_sharing' )):?>
    <li><a href="https://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url(get_permalink($PostID)); ?>&description=<?php echo esc_attr($post_slug=$PostName); ?>"><i class="fab fa-pinterest-p"></i><?php esc_html_e('Pinterest', 'whitehall'); ?></a></li>
    <?php endif; ?>

    <?php if($options->get( 'event_reddit_sharing' )):?>
    <li><a href="http://reddit.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><i class="fab fa-reddit"></i><?php esc_html_e('Reddit', 'whitehall'); ?></a></li>
    <?php endif; ?>

    <?php if($options->get( 'event_tumblr_sharing' )):?>
    <li><a href="http://www.tumblr.com/share/link?url=<?php echo esc_url(get_permalink($PostID)); ?>&name=<?php echo esc_attr($post_slug=$PostName); ?>"><i class="fab fa-tumblr"></i><?php esc_html_e('Tumblr', 'whitehall'); ?></a></li>
    <?php endif; ?>

    <?php if($options->get( 'event_digg_sharing' )):?>
    <li><a href="http://digg.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>"><i class="fab fa-digg"></i><?php esc_html_e('Digg', 'whitehall'); ?></a></li>
    <?php endif; ?>
</ul>
<?php }

//Our Blog Share
function whitehall_share_us_two($PostID = '', $PostName = '')
{
$options = whitehall_WSH()->option();
?>
<ul class="social-links clearfix">
	<?php if($options->get( 'facebook_sharing' )):?>
    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink($PostID)); ?>" class="fab fa-facebook-f" target="_blank"></a></li>
    <?php endif; ?>

    <?php if($options->get( 'twitter_sharing' )):?>
    <li><a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink($PostID)); ?>&text=<?php echo esc_attr($post_slug=$PostName); ?>" class="fab fa-twitter" target="_blank"></a></li>
    <?php endif; ?>

    <?php if($options->get( 'linkedin_sharing' )):?>
    <li><a href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>" class="fab fa-linkedin" target="_blank"></a></li>
    <?php endif; ?>

    <?php if($options->get( 'pinterest_sharing' )):?>
    <li><a href="https://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url(get_permalink($PostID)); ?>&description=<?php echo esc_attr($post_slug=$PostName); ?>" class="fab fa-pinterest"></a></li>
    <?php endif; ?>

    <?php if($options->get( 'reddit_sharing' )):?>
    <li><a href="http://reddit.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>" class="fab fa-reddit"></a></li>
    <?php endif; ?>

    <?php if($options->get( 'tumblr_sharing' )):?>
    <li><a href="http://www.tumblr.com/share/link?url=<?php echo esc_url(get_permalink($PostID)); ?>&name=<?php echo esc_attr($post_slug=$PostName); ?>" class="fab fa-tumblr"></a></li>
    <?php endif; ?>

    <?php if($options->get( 'digg_sharing' )):?>
    <li><a href="http://digg.com/submit?url=<?php echo esc_url(get_permalink($PostID)); ?>&title=<?php echo esc_attr($post_slug=$PostName); ?>" class="fab fa-digg"></a></li>
    <?php endif; ?>
	
</ul>
<?php }
