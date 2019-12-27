<?php
/**
 * Settings for IuteCredit Gateway.
 *
 * @package WooCommerce/Classes/Payment
 */

defined( 'ABSPATH' ) || exit;

foreach (get_terms('product_cat') as $value) {
	$unique_campaign[$value->term_id] = $value->name;
}

if (!empty($unique_campaign)) {
	$unique_campaign = array('disable' => __( 'Disable', 'iutecredit-payment' )) + $unique_campaign;
} else {
	$unique_campaign = array('disable' => __( 'Product category not found', 'iutecredit-payment' ));
}

return array(
	'enabled' => array(
		'title'   => __( 'Enable IuteCredit', 'iutecredit-payment' ),
		'type'    => 'checkbox',
		'label'   => __( 'Enable/Disable', 'iutecredit-payment' ),
		'default' => 'no',
	),
	'title' => array(
		'title'       => __( 'Title', 'iutecredit-payment' ),
		'type'        => 'text',
		'description' => __( 'This controls the title which the user sees during checkout.', 'iutecredit-payment' ),
		'default'     => __( 'IuteCredit', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'username' => array(
		'title'       => __( 'Iute auth: Username', 'iutecredit-payment' ),
		'type'        => 'text',
		'desc_tip'    => true,
	),
	'password' => array(
		'title'       => __( 'Iute auth: Password', 'iutecredit-payment' ),
		'type'        => 'text',
		'desc_tip'    => true,
	),
	'agent_id' => array(
		'title'       => __( 'Iute auth: Agent ID', 'iutecredit-payment' ),
		'type'        => 'number',
		'desc_tip'    => true,
	),
	'monthly_payment_box' => array(
		'title'       => __( 'Monthly Payment', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Monthly Payment before Add to cart button', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_total' => array(
		'title'       => __( 'Display Total Cost', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Total Cost info on calculator', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_commision' => array(
		'title'       => __( 'Display Commision', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Commission info on calculator', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_admin_fee' => array(
		'title'       => __( 'Display Admin fee', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Admin fee info on calculator', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_interest_cost' => array(
		'title'       => __( 'Display Interest cost', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Interest cost info on calculator', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_apr' => array(
		'title'       => __( 'Display APR %', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display APR % info on calculator', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_xirr' => array(
		'title'       => __( 'Display XIRR %', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display XIRR % on calculator', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_patr' => array(
		'title'       => __( 'Display Patronymic', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Patronymic field in loan application form', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
	'info_bank' => array(
		'title'       => __( 'Display Bank account number', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox',
		'description' => __( 'Display Bank account number field in loan application form', 'iutecredit-payment' ),
		'desc_tip'    => true,
	),
    'use_api' => array(
        'title'       => __( 'Use api for calculation', 'iutecredit-payment' ),
        'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
        'type'        => 'checkbox',
        'description' => __( 'Use api for calculation Monthly payment', 'iutecredit-payment' ),
        'desc_tip'    => true,
    ),
	'user_agree' => array(
		'title'       => __( 'User agreement text', 'iutecredit-payment' ),
		'type'        => 'text'
	),
	'unique_campaign_cat' => array(
		'title'       => __( 'Unique Campaign Category', 'iutecredit-payment' ),
		'type'        => 'select',
		'description' => __( 'Unique Campaign', 'iutecredit-payment' ),
		'desc_tip'    => true,
		'options'	  => $unique_campaign
	),
	'unique_campaign_id' => array(
		'title'       => __( 'Unique Campaign ID', 'iutecredit-payment' ),
		'type'        => 'number',
		'description' => __( 'Unique Campaign', 'iutecredit-payment' ),
		'desc_tip'    => true
	),
	'unique_campaign_disc' => array(
		'title'       => __( 'Unique Campaign Disclaimer ', 'iutecredit-payment' ),
		'type'        => 'textarea',
		'description' => __( 'Unique Campaign', 'iutecredit-payment' ),
		'desc_tip'    => true
	),
	'email' => array(
		'title'       => __( 'Email notification', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox'
	),
	'email_admin' => array(
		'title'       => __( 'Email: Admin address', 'iutecredit-payment' ),
		'type'        => 'text',
		'default'	  => get_option('admin_email')
	),
	'email_user' => array(
		'title'       => __( 'Email: notify user', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'type'        => 'checkbox'
	),
	'dev_mode' => array(
		'title'       => __( 'Developer mode', 'iutecredit-payment' ),
		'label' 	  => __( 'Enable/Disable', 'iutecredit-payment' ),
		'description' => __( 'Use test servers' ),
		'type'        => 'checkbox'
	),

);