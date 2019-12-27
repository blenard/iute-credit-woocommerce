<?php 
add_action( 'wp_enqueue_scripts', 'iute_scripts', 100);
add_action('admin_enqueue_scripts', 'admin_style');

function iute_scripts ()
{
	$iute = new WC_Gateway_IuteCredit();
	
	// css
	wp_enqueue_style( PNAME . '-style', plugin_dir_url( __DIR__ ) . 'assets/dist/css/app.css' ); 

	// js
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', plugin_dir_url( __DIR__ ) . 'assets/dist/js/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( PNAME . '-js', plugin_dir_url( __DIR__ ) . 'assets/dist/js/app.js', array('jquery'), '1.0.0', true );

	if ($iute->get_option('dev_mode') == 'yes') {
		$api_url = IUTE_API_URL_DEV;
	} else {
		$api_url = IUTE_API_URL;
	}
	
	wp_localize_script( PNAME . '-js', 'iute_params', array(

		'api_url' => admin_url('admin-ajax.php'),
		'country' => WC_Countries::get_base_country(),
		'currency' => get_woocommerce_currency(),
		'agent_id' => $iute->get_option('agent_id'),
        'use_api' => $iute->get_option('use_api')

	));

}

function admin_style()
{
	// admin css
	wp_enqueue_style( PNAME . '-admin-styles', plugin_dir_url( __DIR__ ) . 'assets/dist/css/iute-admin.css');

	// admin js
	wp_enqueue_script( PNAME .'admin-script', plugin_dir_url( __DIR__ ) . 'assets/dist/js/admin.js', array( 'jquery' ), null, true );

	wp_localize_script(PNAME .'admin-script', 'iute', array(
		'url' => admin_url('admin-ajax.php')
	));
}
