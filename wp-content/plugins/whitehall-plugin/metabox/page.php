<?php
return array(
	'title'      => 'Whitehall Setting',
	'id'         => 'whitehall_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'department', 'tribe_events' ),
	'sections'   => array(
		require_once WHITEHALLPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once WHITEHALLPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once WHITEHALLPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once WHITEHALLPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);