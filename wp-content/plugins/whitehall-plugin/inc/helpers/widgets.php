<?php
///----Blog widgets---
//Popular Post
class Whitehall_Popular_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_Popular_Post', /* Name */esc_html__('Whitehall Popular Post','whitehall'), array( 'description' => esc_html__('Show the Popular Post in blog sidebar.', 'whitehall' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="post-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			
			<div class="widget-content">
				<?php $query_string = 'posts_per_page='.$instance['number'];
				if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
				$this->posts($query_string); ?>
			</div>
		</div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Popular Post', 'whitehall');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'whitehall'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'whitehall'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
			<div class="post">
				<figure class="post-thumb" style="background-image:url( <?php echo esc_url( $post_thumbnail_url );?> );"></figure>
				<h6><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h6>
				<p><i class="far fa-calendar"></i><?php echo get_the_date(); ?></p>
			</div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----Footer widgets---
//Contact Info
class Whitehall_Contact_Info extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_Contact_Info', /* Name */esc_html__('Whitehall Contact Info','whitehall'), array( 'description' => esc_html__('Show the Contact Info in footer v1', 'whitehall' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget);?>
        
		<div class="contact-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			<div class="widget-content">
				<ul class="info clearfix">
					<?php if($instance['address_title'] and $instance['address']) { ?>
					<li>
						<h5><?php echo wp_kses_post($instance['address_title']); ?></h5>
						<p><?php echo wp_kses_post($instance['address']); ?></p>
					</li>
					<?php } ?>
					
					<?php if($instance['phone_title'] and $instance['phone_number']) { ?>
					<li>
						<h5><?php echo wp_kses_post($instance['phone_title']); ?></h5>
						<p><a href="tel:<?php echo esc_attr(phone_number($instance['phone_number'])); ?>"><?php echo wp_kses_post($instance['phone_number']); ?></a></p>
					</li>
					<?php } ?>
					
					<?php if($instance['email_title'] and $instance['email_address']) { ?>
					<li>
						<h5><?php echo wp_kses_post($instance['email_title']); ?></h5>
						<p><a href="mailto:<?php echo sanitize_email($instance['email_address']); ?>"><?php echo sanitize_email($instance['email_address']); ?></a></p>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>

        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address_title'] = strip_tags($new_instance['address_title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone_title'] = strip_tags($new_instance['phone_title']);
		$instance['phone_number'] = $new_instance['phone_number'];
		$instance['email_title'] = strip_tags($new_instance['email_title']);
		$instance['email_address'] = $new_instance['email_address'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Contact Info', 'whitehall');
		$address_title = ($instance) ? esc_attr($instance['address_title']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$phone_title = ($instance) ? esc_attr($instance['phone_title']) : '';
		$phone_number = ($instance) ? esc_attr($instance['phone_number']) : '';
		$email_title = ($instance) ? esc_attr($instance['email_title']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('address_title')); ?>"><?php esc_html_e('Address Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address_title')); ?>" name="<?php echo esc_attr($this->get_field_name('address_title')); ?>" type="text" value="<?php echo esc_attr($address_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'whitehall'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>"><?php esc_html_e('Phone Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>" type="text" value="<?php echo esc_attr($phone_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_number')); ?>"><?php esc_html_e('Phone Number:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_number')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_number')); ?>" type="text" value="<?php echo esc_attr($phone_number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email_title')); ?>"><?php esc_html_e('Email Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title')); ?>" name="<?php echo esc_attr($this->get_field_name('email_title')); ?>" type="text" value="<?php echo esc_attr($email_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Address:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        
		<?php 
	}
	
}

//Register Your Complaint
class Whitehall_Register_Your_Complaint extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_Register_Your_Complaint', /* Name */esc_html__('Whitehall Register Your Complaint','whitehall'), array( 'description' => esc_html__('Show the Register Your Complaint footer v1', 'whitehall' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>
		
		<div class="register-widget">
			<div class="inner-box">
				<div class="upper">
					<div class="icon-box"><i class="<?php echo esc_attr($instance['icon']); ?>"></i></div>
					<h4><?php echo wp_kses_post($instance['title']); ?></h4>
				</div>
				<p><?php echo wp_kses_post($instance['content']); ?></p>
				
				<?php if($instance['btn_link'] and $instance['btn_title']) { ?>
				<a href="<?php echo esc_url($instance['btn_link']); ?>"><?php echo wp_kses_post($instance['btn_title']); ?></a>
				<?php } ?>
			</div>
		</div>

        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['icon'] = $new_instance['icon'];
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$icon = ($instance) ? esc_attr($instance['icon']) : '';
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';

		?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e('Icon:', 'whitehall'); ?></label>
            <input placeholder="flaticon-edit" class="widefat" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'whitehall'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>

		<?php
	}

}

///----Footer widgets V2---
//About Company
class Whitehall_About_Company extends WP_Widget
{

	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_About_Company', /* Name */esc_html__('Whitehall About Company','whitehall'), array( 'description' => esc_html__('Show the About Company footer v1', 'whitehall' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );

		echo wp_kses_post($before_widget);?>

		<div class="footer-widget logo-widget">
			<figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr_e('Logo', 'whitehall'); ?>" /></a></figure>
			<div class="text">
				<p><?php echo wp_kses_post($instance['content']); ?></p>
			</div>
			
			<?php if( $instance['show'] ): ?>
			<?php echo wp_kses_post(whitehall_get_social_icons()); ?>
			<?php endif; ?>
		</div>

        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_image'] = strip_tags($new_instance['logo_image']);
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ($instance) ? esc_attr($instance['logo_image']) : get_template_directory_uri().'/assets/images/footer-logo.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';

		?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image URL:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'whitehall'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'whitehall'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>

		<?php
	}

}

//Recent News
class Whitehall_Recent_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_Recent_News', /* Name */esc_html__('Whitehall Recent News','whitehall'), array( 'description' => esc_html__('Show the Recent Post', 'whitehall' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="post-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			<div class="widget-content">
				<div class="post-inner">
					<?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					$this->posts($query_string); ?>
				</div>
			</div>
		</div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Recent News', 'whitehall');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'whitehall'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'whitehall'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
			<div class="post">
				<div class="post-date"><h3><?php echo get_the_date('d'); ?><span><?php echo get_the_date('M'); ?>’<?php echo get_the_date('y'); ?></span></h3></div>
				<p><i class="far fa-user"></i><?php the_author(); ?></p>
				<h5><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
			</div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----Departments widgets V2---
//Join Us
class Whitehall_Join_Us extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_Join_Us', /* Name */esc_html__('Whitehall Join Us','whitehall'), array( 'description' => esc_html__('Show the Join Us department sidebar.', 'whitehall' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>
		
		<div class="sidebar-banner centred" style="background-image: url(<?php echo esc_url($instance['bg_image']); ?>);">
			<div class="inner-box">
				<div class="icon-box"><i class="<?php echo esc_attr($instance['icon']); ?>"></i></div>
				<h3><?php echo wp_kses_post($instance['content']); ?></h3>
				
				<?php if($instance['btn_link'] and $instance['btn_title']) { ?>
				<a href="<?php echo esc_url($instance['btn_link']); ?>"><?php echo wp_kses_post($instance['btn_title']); ?></a>
				<?php } ?>
			</div>
		</div>

        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['bg_image'] = $new_instance['bg_image'];
		$instance['icon'] = $new_instance['icon'];
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$bg_image = ($instance) ? esc_attr($instance['bg_image']) : get_template_directory_uri().'/assets/images/icons/vector-4.png';
		$icon = ($instance) ? esc_attr($instance['icon']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';

		?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_image')); ?>"><?php esc_html_e('Background Image URL:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_image')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_image')); ?>" type="text" value="<?php echo esc_attr($bg_image); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e('Icon:', 'whitehall'); ?></label>
            <input placeholder="flaticon-global-warming" class="widefat" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'whitehall'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>

		<?php
	}

}

//Get In Touch
class Whitehall_Get_In_Touch extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Whitehall_Get_In_Touch', /* Name */esc_html__('Whitehall Get In Touch','whitehall'), array( 'description' => esc_html__('Show the Contact Info in footer v1', 'whitehall' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget);?>
        
		<div class="sidebar-contact">
			<div class="widget-title">
				<h3><?php echo wp_kses_post($instance['title']); ?></h3>
				<p><?php echo wp_kses_post($instance['content']); ?></p>
				<div class="title-shape"></div>
			</div>
			
			<ul class="info-list clearfix">
				<?php if($instance['phone_title'] and $instance['phone_number']) { ?>
				<li>
					<div class="icon-box"><i class="<?php echo esc_attr($instance['phone_icon']); ?>"></i></div>
					<h5><?php echo wp_kses_post($instance['phone_title']); ?></h5>
					<p><a href="tel:<?php echo esc_attr(phone_number($instance['phone_number'])); ?>"><?php echo wp_kses_post($instance['phone_number']); ?></a></p>
				</li>
				<?php } ?>
				
				<?php if($instance['emergency_title'] and $instance['emergency_number']) { ?>
				<li>
					<div class="icon-box"><i class="<?php echo esc_attr($instance['emergency_icon']); ?>"></i></div>
					<h5><?php echo wp_kses_post($instance['emergency_title']); ?></h5>
					<p><a href="tel:<?php echo esc_attr(phone_number($instance['emergency_number'])); ?>"><?php echo wp_kses_post($instance['emergency_number']); ?></a><?php echo wp_kses_post($instance['emergency_text']); ?></p>
				</li>
				<?php } ?>
				
				<?php if($instance['non_emergency_title'] and $instance['non_emergency_number']) { ?>
				<li>
					<div class="icon-box"><i class="<?php echo esc_attr($instance['non_emergency_icon']); ?>"></i></div>
					<h5><?php echo wp_kses_post($instance['non_emergency_title']); ?></h5>
					<p><a href="tel:<?php echo esc_attr(phone_number($instance['non_emergency_number'])); ?>"><?php echo wp_kses_post($instance['non_emergency_number']); ?></a><?php echo wp_kses_post($instance['non_emergency_text']); ?></p>
				</li>
				<?php } ?>
			</ul>
		</div>

        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = strip_tags($new_instance['content']);
		$instance['phone_title'] = strip_tags($new_instance['phone_title']);
		$instance['phone_icon'] = strip_tags($new_instance['phone_icon']);
		$instance['phone_number'] = $new_instance['phone_number'];
		$instance['emergency_title'] = $new_instance['emergency_title'];
		$instance['emergency_icon'] = $new_instance['emergency_icon'];
		$instance['emergency_number'] = $new_instance['emergency_number'];
		$instance['emergency_text'] = $new_instance['emergency_text'];
		$instance['non_emergency_title'] = $new_instance['non_emergency_title'];
		$instance['non_emergency_icon'] = $new_instance['non_emergency_icon'];
		$instance['non_emergency_number'] = $new_instance['non_emergency_number'];
		$instance['non_emergency_text'] = $new_instance['non_emergency_text'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Get In Touch', 'whitehall');
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$phone_title = ($instance) ? esc_attr($instance['phone_title']) : '';
		$phone_icon = ($instance) ? esc_attr($instance['phone_icon']) : '';
		$phone_number = ($instance) ? esc_attr($instance['phone_number']) : '';
		$emergency_title = ($instance) ? esc_attr($instance['emergency_title']) : '';
		$emergency_icon = ($instance) ? esc_attr($instance['emergency_icon']) : '';
		$emergency_number = ($instance) ? esc_attr($instance['emergency_number']) : '';
		$emergency_text = ($instance) ? esc_attr($instance['emergency_text']) : '';
		$non_emergency_title = ($instance) ? esc_attr($instance['non_emergency_title']) : '';
		$non_emergency_icon = ($instance) ? esc_attr($instance['non_emergency_icon']) : '';
		$non_emergency_number = ($instance) ? esc_attr($instance['non_emergency_number']) : '';
		$non_emergency_text = ($instance) ? esc_attr($instance['non_emergency_text']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'whitehall'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>"><?php esc_html_e('Phone Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>" type="text" value="<?php echo esc_attr($phone_title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_icon')); ?>"><?php esc_html_e('Phone Icon:', 'whitehall'); ?></label>
            <input placeholder="flaticon-government" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_icon')); ?>" type="text" value="<?php echo esc_attr($phone_icon); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_number')); ?>"><?php esc_html_e('Phone Number:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_number')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_number')); ?>" type="text" value="<?php echo esc_attr($phone_number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('emergency_title')); ?>"><?php esc_html_e('Emergency Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('emergency_title')); ?>" name="<?php echo esc_attr($this->get_field_name('emergency_title')); ?>" type="text" value="<?php echo esc_attr($emergency_title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('emergency_icon')); ?>"><?php esc_html_e('Emergency Icon:', 'whitehall'); ?></label>
            <input placeholder="flaticon-alert" class="widefat" id="<?php echo esc_attr($this->get_field_id('emergency_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('emergency_icon')); ?>" type="text" value="<?php echo esc_attr($emergency_icon); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('emergency_number')); ?>"><?php esc_html_e('Emergency Number:', 'whitehall'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('emergency_number')); ?>" name="<?php echo esc_attr($this->get_field_name('emergency_number')); ?>" type="text" value="<?php echo esc_attr($emergency_number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('emergency_text')); ?>"><?php esc_html_e('Emergency Text:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('emergency_text')); ?>" name="<?php echo esc_attr($this->get_field_name('emergency_text')); ?>" type="text" value="<?php echo esc_attr($emergency_text); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('non_emergency_title')); ?>"><?php esc_html_e('Non Emergency Title:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('non_emergency_title')); ?>" name="<?php echo esc_attr($this->get_field_name('non_emergency_title')); ?>" type="text" value="<?php echo esc_attr($non_emergency_title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('non_emergency_icon')); ?>"><?php esc_html_e('Non Emergency Icon:', 'whitehall'); ?></label>
            <input placeholder="flaticon-map" class="widefat" id="<?php echo esc_attr($this->get_field_id('non_emergency_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('non_emergency_icon')); ?>" type="text" value="<?php echo esc_attr($non_emergency_icon); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('non_emergency_number')); ?>"><?php esc_html_e('Non Emergency Number:', 'whitehall'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('non_emergency_number')); ?>" name="<?php echo esc_attr($this->get_field_name('non_emergency_number')); ?>" type="text" value="<?php echo esc_attr($non_emergency_number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('non_emergency_text')); ?>"><?php esc_html_e('Non Emergency Text:', 'whitehall'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('non_emergency_text')); ?>" name="<?php echo esc_attr($this->get_field_name('non_emergency_text')); ?>" type="text" value="<?php echo esc_attr($non_emergency_text); ?>" />
        </p>

		<?php 
	}
	
}
