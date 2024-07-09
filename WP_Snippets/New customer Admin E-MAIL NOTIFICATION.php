/**
 * New customer Admin E-MAIL NOTIFICATION
 *
 * Allow to receive notification when new customer sign-up
 */
function custom_new_user_notification($user_id) {
	$admin_email = 'email@email.com';
    $user = get_userdata($user_id);
	
	$subject = "New user registration: $user->user_login";
    $message = sprintf(__("Trading name: %s"), $user->user_login) . "<br>";
    $message .= sprintf(__("E-mail: %s"), $user->user_email) . "<br>";
	$message .= sprintf(__("You can change the role of this user by next link: %s"), "https://example.com/wp-admin/user-edit.php?user_id=" . $user_id); // example
	
	$email_heading = 'New user registration';
    $email_header = wc_get_template_html( 'emails/email-header.php', array( 'email_heading' => $email_heading ) );
    $email_footer = wc_get_template_html( 'emails/email-footer.php' );
            
    $message = $email_header . $message . $email_footer;

    wc_mail($admin_email, $subject, $message);
}
add_action('user_register', 'custom_new_user_notification');