<?php 

class WC_Iute_Status_Email 
{
	public function send_mail($emails, $message)
	{
		$subject = get_bloginfo('name') . ': ' . __( 'IuteCredit application status', 'iutecredit-payment' );
		foreach ($emails as $email) {
			wp_mail( $email, $subject, $message, array('Content-Type: text/html; charset=UTF-8') );
		}
	}
}