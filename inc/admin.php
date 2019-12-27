<?php 

add_action( 'woocommerce_admin_order_data_after_order_details', 'iute_display_order_data_in_admin' );
add_filter( 'manage_edit-shop_order_columns', 'wc_iute_order_column', 20 );
add_action( 'manage_shop_order_posts_custom_column', 'wc_iute_order_column_content' );
add_action( 'wp_ajax_woo_save', 'woo_save' );

function iute_display_order_data_in_admin( $order )
{ 
	if (get_post_meta( $order->id, '_iute_number')):
		?>
		<div class="form-field iute-order">
			<h3><?php _e( 'IuteCredit loan status', 'iutecredit-payment' ); ?></h3>
			<?php 
			echo '<p><strong>' . __( 'Loan status', 'iutecredit-payment' ) . ': </strong>' . get_post_meta( $order->id, '_iute_status', true ) . '</p>';
			echo '<p><strong>' . __( 'Loan number', 'iutecredit-payment' ) . ': </strong>' . get_post_meta( $order->id, '_iute_number', true ) . '</p>'; ?>
		</div>
		<?php 
	endif;
}

function wc_iute_order_column( $columns )
{
	$new_columns = array();
	foreach ( $columns as $column_name => $column_info ) {
		$new_columns[ $column_name ] = $column_info;

		if ( 'order_status' === $column_name ) {
			$new_columns['order_iute_status'] = __( 'IuteCredit status', 'iutecredit-payment' );
		}
	}
	return $new_columns;
}

function wc_iute_order_column_content( $column )
{
	global $post;
	if ( 'order_iute_status' === $column ) {
		echo get_post_meta($post->ID, '_iute_status')[0];
	}
}

function woo_save ()
{
	do_action('iute_params_update');
	die();
}