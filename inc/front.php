<?php 

// before add to cart button
function iute_before_add_to_card(){
	$product = wc_get_product( get_the_ID() );

	$iute_templates = new WC_Gateway_Iute_Template();

	echo $iute_templates->add_to_cart_before_single($product->get_price_including_tax());
};

function iute_before_button_loop( $add_to_cart_html, $product, $args ){
	$product = wc_get_product( get_the_ID() );

	$iute_params = new WC_Gateway_IuteCredit();

	$username = $iute_params->get_option('username');
	$password = $iute_params->get_option('password');
	$agent_id = $iute_params->get_option('agent_id');

	$iute_templates = new WC_Gateway_Iute_Template();

	$base_loan_template = $iute_templates->add_to_cart_before(
		$username, 
		$password, 
		$agent_id, 
		$product->get_price_including_tax()
	);

	return $base_loan_template . $add_to_cart_html;

};

add_action('init', function () {
	$options = new WC_Gateway_IuteCredit;

	if ($options->get_option('monthly_payment_box') == 'yes') {
		add_action( 'woocommerce_single_product_summary', 'iute_before_add_to_card', 1 );
		add_filter( 'woocommerce_loop_add_to_cart_link', 'iute_before_button_loop', 10, 3 );
	}
}, 10, 0);

