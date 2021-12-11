<?php namespace WHITEHALLPLUGIN\Element;

class Elementor {
	static $widgets = array(
		'slider_v1',
		'slider_v2',
		'our_features',
		'about_us_v1',
		'explore_city_government',
		'recent_documents_v1',
		'departments_v1',
		'our_schedules',
		'online_services',
		'testimonials_v1',
		'team_v1',
		'blog_v1',
		'facts_counter_v1',
		'services_v1',
		'departments_v2',
		'services_v2',
		'about_us_v2',
		'team_v2',
		'recent_documents_v2',
		'places_to_visit',
		'events',
		'blog_v2',
		'testimonials_v2',
		'facts_counter_v2',
		'suggestions_and_complaints',
		'about_us_v3',
		'discover_our_city',
		'information_and_attractions',
		'awards',
		'about_our_government',
		'history',
		'about_services',
		'services_v3',
		'faqs',
		'make_donation',
		'portfolio_v1',
		'portfolio_v2',
		'portfolio_v3',
		'faqs_v2',
		'about_department',
		'departments_v3',
		'department_details',
		'events_grid',
		'events_list',
		'blog_grid',
		'contact_info',
		'our_offices',
		'contact_us',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = WHITEHALLPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\WHITEHALLPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'whitehall',
			[
				'title' => esc_html__( 'Whitehall', 'whitehall' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'whitehall' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();