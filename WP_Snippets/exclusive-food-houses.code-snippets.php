<?php

/**
 * New customer Michael E-MAIL NOTIFICATION
 *
 * Allow to receive notification when new customer sign-up
 */
function custom_new_user_notification($user_id) {
	$admin_email = 'imports@efh.au';
    $user = get_userdata($user_id);
	
	$subject = "New user registration: $user->user_login";
    $message = sprintf(__("Trading name: %s"), $user->user_login) . "<br>";
    $message .= sprintf(__("E-mail: %s"), $user->user_email) . "<br>";
	$message .= sprintf(__("You can change the role of this user by next link: %s"), "https://efh.au/wp-admin/user-edit.php?user_id=" . $user_id);
	
	$email_heading = 'New user registration';
    $email_header = wc_get_template_html( 'emails/email-header.php', array( 'email_heading' => $email_heading ) );
    $email_footer = wc_get_template_html( 'emails/email-footer.php' );
            
    $message = $email_header . $message . $email_footer;

    wc_mail($admin_email, $subject, $message);
}
add_action('user_register', 'custom_new_user_notification');

/**
 * New billing fields in USERS profile
 */
//Adding Trading Name
add_action( 'edit_user_profile', 'add_billing_company_trading_profile_fields' );
function add_billing_company_trading_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_company_trading"><?php esc_html_e( 'TRADING NAME', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_company_trading" id="billing_company_trading" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_company_trading', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_company_trading_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_company_trading_user_profile_fields' );
function save_billing_company_trading_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_company_trading', sanitize_text_field( $_POST['billing_company_trading'] ) );
}
////Adding ABN
add_action( 'edit_user_profile', 'add_billing_abn_name_profile_fields' );
function add_billing_abn_name_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_abn_name"><?php esc_html_e( 'A.B.N. or A.C.N.', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_abn_name" id="billing_abn_name" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_abn_name', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_abn_name_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_abn_name_user_profile_fields' );
function save_billing_abn_name_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_abn_name', sanitize_text_field( $_POST['billing_abn_name'] ) );
}
//Adding Position
add_action( 'edit_user_profile', 'add_billing_position_profile_fields' );
function add_billing_position_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_position"><?php esc_html_e( 'Position', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_position" id="billing_position" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_position', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_position_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_position_user_profile_fields' );
function save_billing_position_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_position', sanitize_text_field( $_POST['billing_position'] ) );
}
//Secondary_contact
add_action( 'edit_user_profile', 'add_billing_secondary_contact_profile_fields' );
function add_billing_secondary_contact_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_secondary_contact"><?php esc_html_e( 'Secondary contact', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_secondary_contact" id="billing_secondary_contact" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_secondary_contact', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_secondary_contact_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_secondary_contact_user_profile_fields' );
function save_billing_secondary_contact_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_secondary_contact', sanitize_text_field( $_POST['billing_secondary_contact'] ) );
}
//Adding Preferred transport company
add_action( 'edit_user_profile', 'add_billing_transport_company_profile_fields' );
function add_billing_transport_company_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_transport_company"><?php esc_html_e( 'Preferred transport company', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_transport_company" id="billing_transport_company" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_transport_company', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_transport_company_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_transport_company_user_profile_fields' );
function save_billing_transport_company_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_transport_company', sanitize_text_field( $_POST['billing_transport_company'] ) );
}
//Adding Delivery instructions
add_action( 'edit_user_profile', 'add_billing_special_instructions_profile_fields' );
function add_billing_special_instructions_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_special_instructions"><?php esc_html_e( 'Delivery instructions', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_special_instructions" id="billing_special_instructions" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_special_instructions', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_special_instructions_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_special_instructions_user_profile_fields' );
function save_billing_special_instructions_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_special_instructions', sanitize_text_field( $_POST['billing_special_instructions'] ) );
}
//Adding Custumer number
add_action( 'edit_user_profile', 'add_billing_customer_number_profile_fields' );
function add_billing_customer_number_profile_fields( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="billing_custumer_number"><?php esc_html_e( 'Customer number', 'woocommerce' ); ?></label>
            </th>
            <td>
                <input type="text" name="billing_customer_number" id="billing_customer_number" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_customer_number', true ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'save_billing_customer_number_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_billing_customer_number_user_profile_fields' );
function save_billing_customer_number_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'billing_customer_number', sanitize_text_field( $_POST['billing_customer_number'] ) );
}

/**
 * Remove download section from my account
 */
/**
 * Remove Downloads section from My Account page
 */
function remove_downloads_tab( $items ) {
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'remove_downloads_tab' );

function disable_downloads_endpoint() {
    add_filter( 'woocommerce_account_downloads_endpoint', '__return_false' );
}
add_action( 'init', 'disable_downloads_endpoint' );

/**
 * Delete TERMS AND CONDITIONS approved in checkout
 */
add_filter('woocommerce_terms_is_checked_default', '__return_true');

/**
 * Add company billing name in new order subject notification
 */
function my_custom_email_subject( $subject, $order ) {
    // Get the user ID from the order
    $user_id = $order->get_user_id();

    // Get the user object
    $user = get_user_by( 'ID', $user_id );

    if ( $user ) {
        // Get the username from the user object
        $username = $user->user_login;

        // Append the username to the subject line
        $subject .= ' - from: ' . $username;
    }

    return $subject;
}
add_filter( 'woocommerce_email_subject_new_order', 'my_custom_email_subject', 10, 2 );

/**
 * Generate username using tranding name
 */
function generate_username_from_company_name( $username, $email, $return_username ) {
    $company_name = $_POST['billing_company_trading'];
	$first_name = $_POST['billing_first_name'];
    if ( !empty( $company_name ) && !empty( $first_name )) {
        $username = sanitize_user( $company_name . '-' . $first_name );
		$username = str_replace( '&', 'and', $username );
    }
    return $username;
}
add_filter( 'woocommerce_new_customer_username', 'generate_username_from_company_name', 10, 3 );

/**
 * Password hint fix
 */
// Second, change the wording of the password hint.
add_filter( 'password_hint', 'smarter_password_hint' );
function smarter_password_hint ( $hint ) {
    $hint = '<h5>Hint: The password should be at least 9 characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).</h5>';
    return $hint;
}

/**
 * Remove spaces in weight
 */
add_filter('woocommerce_format_weight', 'custom_format_weight');

function custom_format_weight($weight_string) {
    return preg_replace('/\s+/', '', $weight_string);
}

/**
 * Order USERS by registration date by default
 */
add_action( 'users_list_table_query_args', function ( $args ) {
	$args['orderby'] = empty( $_REQUEST['orderby'] ) ? 'registered' : $_REQUEST['orderby'];
	$args['order'] = empty( $_REQUEST['order'] ) ? 'DESC' : $_REQUEST['order'];
 
	return $args;
} );

function add_user_registered_column( $columns ) {
    $columns['user_registered'] = 'Registration date';
    return $columns;
}
add_filter( 'manage_users_columns', 'add_user_registered_column' );

function display_user_registered_column( $value, $column_name, $user_id ) {
    if ( 'user_registered' == $column_name ) {
        $user = get_userdata( $user_id );
        if ( $user ) {
            return $user->user_registered;
        }
    }
    return $value;
}
add_action( 'manage_users_custom_column', 'display_user_registered_column', 10, 3 );

function set_user_registered_column_width() {
    echo '<style>.column-user_registered { width: 15%; }</style>';
}
add_action( 'admin_head-users.php', 'set_user_registered_column_width' );

/**
 * Redirect after Log-in to main page
 */
add_filter( 'woocommerce_registration_auth_new_customer', '__return_false' );

/**
 * Notify customer when account approved(Change Role)
 *
 * Notify customer when account approved(Change Role)
 */
function notify_role_change( $user_id, $new_role, $old_roles ) {
    if ( $new_role !== 'customer' ) {
        $user_info = get_userdata( $user_id );
        
        if ( ! empty( $user_info ) ) {
            $user_email = $user_info->user_email;
            $first_name = $user_info->first_name;
            
            $subject = 'Your account has been approved';
            $message = "Hi, " . $first_name . "<br>Your account has been approved.<br>Regards from the Exclusive Food Houses Team";
            
            $email_heading = 'Your account has been approved';
            $email_header = wc_get_template_html( 'emails/email-header.php', array( 'email_heading' => $email_heading ) );
            $email_footer = wc_get_template_html( 'emails/email-footer.php' );
            
            $message = $email_header . $message . $email_footer;
            
            wc_mail( $user_email, $subject, $message );
        }
    }
}
add_action( 'set_user_role', 'notify_role_change', 10, 3 );

/**
 * Order PDF Calculation
 */
function quantity_carton( $item, $document ) {
	if ( $product = $item['product'] ) {
		$quantity = $item['quantity'];
		$product_step = $product->get_meta( 'product_step' );
		// Perform the calculation
		$result = ( $product_step ) ? round( $quantity / $product_step, 2 ): $quantity;
		return '<div style="text-align: center;">' . esc_html( $result ) . '</div>';;
	}
}

/**
 * Remove the "billing_country" field from the billing address
 */
function modify_billing_country_field( $fields ) {
    $fields['billing_country']['type'] = 'hidden';
    return $fields;
}
add_filter( 'woocommerce_billing_fields', 'modify_billing_country_field' );

/**
 * NEW display the Billing Address form to registration page(DEV)
 */
// Function to check starting char of a string
function startsWith($haystack, $needle){
    return $needle === '' || strpos($haystack, $needle) === 0;
}
// Custom function to display the Billing Address form to registration page
function zk_add_billing_form_to_registration(){
    global $woocommerce;
    $checkout = $woocommerce->checkout();
    ?>
    <?php foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) : ?>

        <?php if($key!='billing_email'){ 
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
        } ?>

    <?php endforeach; 
}
add_action('woocommerce_register_form_start','zk_add_billing_form_to_registration');

// Custom function to save Usermeta or Billing Address of registered user
function zk_save_billing_address($user_id){
    global $woocommerce;
    $address = $_POST;
    foreach ($address as $key => $field){
        if(startsWith($key,'billing_')){
            // Condition to add firstname and last name to user meta table
            if($key == 'billing_first_name' || $key == 'billing_last_name'){
                $new_key = explode('billing_',$key);
                update_user_meta( $user_id, $new_key[1], $_POST[$key] );
            }
            update_user_meta( $user_id, $key, $_POST[$key] );
        }
    }

}
add_action('woocommerce_created_customer','zk_save_billing_address');

/**
 * Custom validation script for REGISTRATION and CHECKOUT page
 */
function enqueue_custom_scripts() {
  if (is_account_page() && !is_user_logged_in()) {
    wp_enqueue_script('custom-validation', get_stylesheet_directory_uri() . '/js/custom-validation.js', array('jquery'), '1.0', true);
	wp_enqueue_script('custom-become-register', get_stylesheet_directory_uri() . '/js/custom-become-register.js', array('jquery'), '1.0', true);
  }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function enqueue_custom_checkout_scripts() {
    if (is_checkout()) {
        wp_enqueue_script('custom-checkout', get_stylesheet_directory_uri() . '/js/custom-checkout.js', array('jquery'), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_checkout_scripts');

/**
 * Allow Shop Manager view\edit Users
 */
/* Lets Shop Managers have the capability of editing and promoting users */
function wws_add_shop_manager_user_editing_capability() {
$shop_manager = get_role( 'shop_manager' );
$shop_manager->add_cap( 'edit_users' );
$shop_manager->add_cap( 'edit_user' );
$shop_manager->add_cap( 'promote_users' );
}
add_action( 'admin_init', 'wws_add_shop_manager_user_editing_capability');
 
/* Lets Shop Managers edit users with these user roles */
function wws_allow_shop_manager_role_edit_capabilities( $roles ) {
$roles[] = 'Approved_Customer'; // insert the wholesale role here, copy+paste this line for additional user roles
$roles[] = 'Approved_Customer_-5%'; // insert the wholesale role here, copy+paste this line for additional user roles
$roles[] = 'Approved_Customer_-10%'; // insert the wholesale role here, copy+paste this line for additional user roles
return $roles;
}
add_filter( 'woocommerce_shop_manager_editable_roles', 'wws_allow_shop_manager_role_edit_capabilities' );

/**
 * Remove extra elements from USER PROFILE
 */
add_action('admin_head', function () {
    $screen = get_current_screen();

    if (in_array($screen->id, array('profile', 'user-edit'))) {
        // Remove color picker
        remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');

        // Additional removal for Shipping Address
        ?>
        <style>
            #fieldset-shipping {
                display: none !important;
            }
			#application-passwords-section {
                display: none !important;
            }
			.user-description-wrap {
                display: none !important;
            }
			.user-profile-picture {
                display: none !important;
            }
			.user-rich-editing-wrap {
                display: none !important;
            }
			.user-comment-shortcuts-wrap{
                display: none !important;
            }
			.show-admin-bar{
                display: none !important;
            }
			.user-admin-bar-front-wrap{
                display: none !important;
            }
			.user-language-wrap{
                display: none !important;
            }
			.user-switching-wrap{
                display: none !important;
            }
        </style>
        <?php
    }
});

/**
 * Hide Elementor edit button from admin bar
 */
function hide_elementor_edit_link_from_admin_bar($wp_admin_bar) {
    if (is_admin_bar_showing()) {
        $wp_admin_bar->remove_node('edit-with-elementor');
    }
}
add_action('admin_bar_menu', 'hide_elementor_edit_link_from_admin_bar', 999);

/**
 * Change column in ORDERs, from Orders to order number + client name
 */
function replace_order_column_content( $column ) {
    global $post;

    if ( 'order_number' === $column ) {
        $order = wc_get_order( $post->ID );
        $user_id = $order->get_user_id();
            $user = get_user_by( 'ID', $user_id );
            echo $user->user_login . '<br>';
    }
}
add_action( 'manage_shop_order_posts_custom_column', 'replace_order_column_content' );

/**
 * Set custom field (Who create the order)
 */
add_action( 'woocommerce_new_order', 'add_billing_order_by_to_new_order', 10, 1 );
function add_billing_order_by_to_new_order( $order_id ) {
    $current_user = wp_get_current_user();
    if ( in_array( 'administrator', $current_user->roles ) || in_array( 'shop_manager', $current_user->roles ) ) {
        $order = wc_get_order( $order_id );
        $billing_order_by = $current_user->user_login;
        update_post_meta( $order_id, 'billing_order_by', $billing_order_by );
    }
}

/**
 * Notify admin when castumer change his data
 */
function notify_admin_on_address_change($user_id) {
	
	// Get current_user_meta
    $user = get_userdata($user_id);
    $admin_email = 'imports@efh.au';
    $subject = $user->user_login . ' - this customer has updated their address information';
	$message = '';
    $current_metadata = get_user_meta($user_id);

    // Check if billing address was changed
    if (isset($_POST['billing_first_name'])) {
	
		$message .= '<table>';
        $message .= '<tr><td><strong>Account</strong></td></tr>';
        $message .= '<tr><td>Username: </td><td>' . $user->user_login . '</td></tr>';
        $message .= '<tr><td colspan="2">&nbsp;</td></tr>';
        $message .= '<tr><td colspan="2"><strong>Current customer address</strong></td></tr>';
        $message .= '<tr><td>Trading name: </td><td>' . $current_metadata['billing_company_trading'][0]. '</td></tr>';
        $message .= '<tr><td>Company name: </td><td>' . $current_metadata['billing_company'][0]. '</td></tr>';
        $message .= '<tr><td>A.B.N. OR A.C.N.: </td><td>' . $current_metadata['billing_abn_name'][0]      . '</td></tr>';
        $message .= '<tr><td>First name: </td><td>' . $current_metadata['billing_first_name'][0]  . '</td></tr>';
        $message .= '<tr><td>Last name: </td><td>' . $current_metadata['billing_last_name'][0]            . '</td></tr>';
        $message .= '<tr><td>Position: </td><td>' . $current_metadata['billing_position'][0]   . '</td></tr>';
        $message .= '<tr><td>Phone: </td><td>' . $current_metadata['billing_phone'][0]      . '</td></tr>';
        $message .= '<tr><td>Secondary Contact: </td><td>' . $current_metadata['billing_secondary_contact'][0]          . '</td></tr>';
        $message .= '<tr><td>Business street address: </td><td>' . $current_metadata['billing_address_1'][0]          . '</td></tr>';
        $message .= '<tr><td>Business Suburb: </td><td>' . $current_metadata['billing_city'][0]          . '</td></tr>';
		$message .= '<tr><td>Business State: </td><td>' . $current_metadata['billing_state'][0]          . '</td></tr>';
		$message .= '<tr><td>Business Postcode: </td><td>' . $current_metadata['billing_postcode'][0]          . '</td></tr>';
		$message .= '<tr><td>Preferred transport company: </td><td>' . $current_metadata['billing_transport_company'][0]          . '</td></tr>';
		$message .= '<tr><td>Delivery instructions: </td><td>' . $current_metadata['billing_special_instructions'][0]          . '</td></tr>';
        $message .= '</table>';    
	}
    if (!empty($message)) {
		$headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($admin_email, $subject, $message, $headers);
    }
}

add_action('woocommerce_customer_save_address', 'notify_admin_on_address_change');

/**
 * Add customer number in USERS table, allow to order(sort) them
 */
// Добавляем колонку для отображения метаданных пользователя
function add_user_billing_number_column( $columns ) {
    $columns['billing_number'] = 'Account Number';
    return $columns;
}
add_filter( 'manage_users_columns', 'add_user_billing_number_column' );

// Выводим значение метаданных пользователя в колонке
function display_user_billing_number_column( $value, $column_name, $user_id ) {
    if ( 'billing_number' == $column_name ) {
        $billing_number = get_user_meta( $user_id, 'billing_customer_number', true );
        return $billing_number;
    }
    return $value;
}
add_action( 'manage_users_custom_column', 'display_user_billing_number_column', 10, 3 );

// Устанавливаем ширину колонки
function set_user_billing_number_column_width() {
    echo '<style>.column-billing_number { width: 10%; }</style>';
}
add_action( 'admin_head-users.php', 'set_user_billing_number_column_width' );

// Добавляем возможность сортировки по новой колонке
function add_sortable_column_header( $columns ) {
    $columns['billing_number'] = 'billing_number';
    return $columns;
}
add_filter( 'manage_users_sortable_columns', 'add_sortable_column_header' );

// Используем кастомный запрос для сортировки
function custom_user_query( $query ) {
    if ( isset( $query->query_vars['orderby'] ) && 'billing_number' === $query->query_vars['orderby'] ) {
        $query->query_vars['meta_key'] = 'billing_customer_number';
        $query->query_vars['orderby']  = 'meta_value';
    }
}
add_action( 'pre_get_users', 'custom_user_query' );

/**
 * Searching filter for USERs by their Account numbers
 */
add_action( 'pre_user_query', 'project_pre_user_search'  );
function project_pre_user_search( $query ) {
    global $wpdb;
    global $pagenow;

    if (is_admin() && 'users.php' == $pagenow) {
        if( empty($_REQUEST['s']) ){return;}
        $query->query_fields = 'DISTINCT '.$query->query_fields;
        $query->query_from .= ' LEFT JOIN '.$wpdb->usermeta.' ON '.$wpdb->usermeta.'.user_id = '.$wpdb->users.'.ID';
        $query->query_where = "WHERE 1=1 AND (user_login LIKE '%".$_REQUEST['s']."%' OR ID = '".$_REQUEST['s']."' OR (meta_value LIKE '%".$_REQUEST['s']."%' AND meta_key = 'billing_customer_number'))";
    }
    return $query;
}

/**
 * Delete Posts column from USERs table
 */
// Удаляем колонку "Posts" из таблицы пользователей
function remove_posts_column( $columns ) {
    unset( $columns['posts'] );
    return $columns;
}
add_filter( 'manage_users_columns', 'remove_posts_column' );

/**
 * Exclude row "Payment method" from ORDER DETAILS
 */
add_filter('woocommerce_get_order_item_totals', 'exclude_payment_method_from_totals', 10, 3);

function exclude_payment_method_from_totals($total_rows, $order, $tax_display){
    unset($total_rows['payment_method']);

    return $total_rows;
}

/**
 * HIDE some Products and Filter brands from NOT logged users
 */
add_action('wp_footer', 'custom_hide_products_js');

function custom_hide_products_js() {
    if (!is_user_logged_in()) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
				
				$('.woocommerce-widget-layered-nav-list__item.wc-layered-nav-term').each(function() {
    // Проверить, содержит ли ссылка текст "Mrs Darlington's"
    if ($(this).find('a').text() === "Mrs Darlington's") {
        // Найти элемент <span> внутри текущего элемента и установить его содержимое на 7
        $(this).find('.widget-list-span').text('7');
				}
				});
				
                $('.post-12590, .post-12591, .post-12584, .post-12585, .post-16179, .post-16183, .post-16185, .post-16188, .post-16198, .post-16200').closest('.ninetheme-type-product').hide();
            });
        </script>
        <?php
    }
}
// Also added in infinite-scroll.js

/**
 * DISABLE automatic TRASH DELETION
 */
function wpb_remove_schedule_delete() {
    remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
add_action( 'init', 'wpb_remove_schedule_delete' );

/**
 * Xmas order filter and CheckBoxes
 */
function add_xmas_order_meta_box() {
    add_meta_box(
        'xmas_order_meta_box', // ID метабокса
        'Xmas Order', // Заголовок метабокса
        'display_xmas_order_meta_box', // Callback функция для отображения метабокса
        'shop_order', // Тип поста, для которого будет добавлен метабокс
        'side', // Контекст, в котором будет отображаться метабокс
        'default' // Приоритет метабокса
    );
}
add_action('add_meta_boxes', 'add_xmas_order_meta_box');

function display_xmas_order_meta_box($post) {
    $value = get_post_meta($post->ID, '_xmas_order', true);
    echo '<label for="xmas_order">';
    echo '<input type="checkbox" name="xmas_order" id="xmas_order" ' . checked($value, 'yes', false) . ' /> Mark as Xmas Order';
    echo '</label>';
}

function save_xmas_order_meta_box($post_id) {
    if (isset($_POST['xmas_order'])) {
        update_post_meta($post_id, '_xmas_order', 'yes');
    } else {
        delete_post_meta($post_id, '_xmas_order');
    }
}
add_action('save_post', 'save_xmas_order_meta_box');

function filter_orders_by_xmas($views) {
    global $wpdb;
    $count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}postmeta WHERE meta_key='_xmas_order' AND meta_value='yes'");
    $class = (isset($_GET['xmas_orders']) && $_GET['xmas_orders'] == '1') ? 'current' : '';

    $views['xmas_orders'] = "<a href='" . admin_url('edit.php?post_type=shop_order&xmas_orders=1') . "' class='$class'>Xmas Orders ($count)</a>";

    return $views;
}
add_filter('views_edit-shop_order', 'filter_orders_by_xmas');

function filter_xmas_orders_query($query) {
    global $pagenow, $post_type;
    
    if ($pagenow == 'edit.php' && $post_type == 'shop_order' && isset($_GET['xmas_orders']) && $_GET['xmas_orders'] == '1') {
        $meta_query = array(
            array(
                'key' => '_xmas_order',
                'value' => 'yes',
                'compare' => '='
            )
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'filter_xmas_orders_query');

// Добавляем новый столбец в таблицу заказов
function add_xmas_order_column($columns) {
    $new_columns = array();
    foreach ($columns as $key => $column) {
        $new_columns[$key] = $column;
        if ($key == 'order_status') { // Добавляем новый столбец после столбца со статусом заказа
            $new_columns['xmas_order'] = __('Xmas', 'textdomain');
        }
    }
    return $new_columns;
}
add_filter('manage_edit-shop_order_columns', 'add_xmas_order_column');

// Отображаем чекбокс в новом столбце
function render_xmas_order_column($column) {
    global $post;
    if ($column == 'xmas_order') {
        $value = get_post_meta($post->ID, '_xmas_order', true);
        echo '<input type="checkbox" class="xmas-order-checkbox" data-order-id="' . $post->ID . '" ' . checked($value, 'yes', false) . ' />';
    }
}
add_action('manage_shop_order_posts_custom_column', 'render_xmas_order_column');

// Сохраняем значение чекбокса при клике (AJAX)
function save_xmas_order_via_ajax() {
    check_ajax_referer('save_xmas_order_nonce', 'security');
    
    $order_id = intval($_POST['order_id']);
    $is_checked = $_POST['is_checked'] === 'true' ? 'yes' : 'no';

    if ($is_checked == 'yes') {
        update_post_meta($order_id, '_xmas_order', 'yes');
    } else {
        delete_post_meta($order_id, '_xmas_order');
    }

    wp_send_json_success();
}
add_action('wp_ajax_save_xmas_order', 'save_xmas_order_via_ajax');

// Добавляем JavaScript для обработки кликов по чекбоксу
function xmas_order_admin_scripts() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.xmas-order-checkbox').on('change', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                var order_id = $(this).data('order-id');
                var is_checked = $(this).is(':checked');
                
                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'save_xmas_order',
                        security: '<?php echo wp_create_nonce("save_xmas_order_nonce"); ?>',
                        order_id: order_id,
                        is_checked: is_checked
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log('Xmas order status updated.'); //TEST IT
                        } else {
                            console.log('Failed to update Xmas order status.');
                        }
                    }
                });
            });
            
            // Предотвращаем открытие заказа при клике на чекбокс
            $('.xmas-order-checkbox').on('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'xmas_order_admin_scripts');

/**
 * TOS products filter and CheckBoxes 
 */
// Добавляем новую колонку "TOS" в таблицу продуктов
function add_tos_column($columns) {
	unset($columns['taxonomy-ninetheme_product_campaigns']); // убирем припезденные компании
    $new_columns = array();
    foreach ($columns as $key => $column) {
        $new_columns[$key] = $column;
        if ($key === 'product_cat') { // Добавляем новую колонку после столбца "Тип продукта"
            $new_columns['tos'] = __('TOS', 'textdomain');
        }
    }
    return $new_columns;
}
add_filter('manage_edit-product_columns', 'add_tos_column');

// Отображаем чекбокс в новой колонке "TOS"
function render_tos_column($column) {
    global $post;
    if ($column === 'tos') {
        $value = get_post_meta($post->ID, '_is_tos', true);
        echo '<input type="checkbox" class="in-stock-checkbox" data-product-id="' . $post->ID . '" ' . checked($value, 'yes', false) . ' />';
    }
}
add_action('manage_product_posts_custom_column', 'render_tos_column');

// Сохраняем значение чекбокса при клике (AJAX)
function save_tos_via_ajax() {
    check_ajax_referer('save_tos_nonce', 'security');
    
    $product_id = intval($_POST['product_id']);
    $is_checked = $_POST['is_checked'] === 'true' ? 'yes' : 'no'; // Значение метаданных меняется на противоположное
    
    update_post_meta($product_id, '_is_tos', $is_checked);

    wp_send_json_success();
}
add_action('wp_ajax_save_tos', 'save_tos_via_ajax');

// Добавляем JavaScript для обработки кликов по чекбоксу
function tos_admin_scripts() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.in-stock-checkbox').on('change', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                var product_id = $(this).data('product-id');
                var is_checked = $(this).is(':checked');
                
                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'save_tos',
                        security: '<?php echo wp_create_nonce("save_tos_nonce"); ?>',
                        product_id: product_id,
                        is_checked: is_checked
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log('Stock status updated.');
                        } else {
                            console.log('Failed to update Stock status.');
                        }
                    }
                });
            });
            
            // Предотвращаем открытие продукта при клике на чекбокс
            $('.in-stock-checkbox').on('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'tos_admin_scripts');

/**
 * Redirect FROM REGISTRATION in backend
 */
// Полное отключение страницы регистрации и перенаправление
function redirect_registration_page() {
    if ($_SERVER['REQUEST_URI'] == '/wp-login.php?action=register') {
        wp_redirect('https://efh.au/my-account/?register'); // Перенаправляем на страницу регистрации
        exit();
    }
}
add_action('init', 'redirect_registration_page');

/**
 * Recalculate PRICE with TOS
 */
add_action('woocommerce_checkout_order_processed', 'adjust_order_prices_if_meta_is_tos', 10, 1);

function adjust_order_prices_if_meta_is_tos($order_id) {
    $order = wc_get_order($order_id);

    foreach ($order->get_items() as $item_id => $item) {
        $product = $item->get_product();
        if (!$product) continue;

        $product_id = $product->get_id();
        
        // Проверка метаданных _is_tos
        if (get_post_meta($product_id, '_is_tos', true) === 'yes') {
            // Изменение цены на ноль
            $item->set_subtotal(0);
            $item->set_total(0);
            // Если у товара есть скидка, также устанавливаем ее на 0
            $item->set_subtotal_tax(0);
            $item->set_total_tax(0);
            
            // Изменение названия товара, если еще не изменено
            if (strpos($item->get_name(), ' - TOS') === false) {
                $item->set_name($item->get_name() . ' <strong style="font-size:1.2em;"> - TOS</strong>');
            }

            $item->save(); // Сохранение изменений
        }
    }

    // Пересчет итоговой суммы заказа
    $order->calculate_totals();
}

add_action('woocommerce_checkout_create_order_line_item', 'change_order_item_name_if_meta_is_tos', 10, 4);

function change_order_item_name_if_meta_is_tos($item, $cart_item_key, $values, $order) {
    $product = $item->get_product();
    if (!$product) return;

    $product_id = $product->get_id();
    
    // Проверка метаданных _is_tos
    if (get_post_meta($product_id, '_is_tos', true) === 'yes') {
        // Изменение названия товара, если еще не изменено
        if (strpos($item->get_name(), ' - TOS') === false) {
            $item->set_name($item->get_name() . ' <strong style="font-size:1.2em;"> - TOS</strong>');
        }
    }
}

/**
 * Custom scroll scripts for Main and Shop pages
 */
function enqueue_custom_scroll_scripts() {
    if (is_front_page()) {
        wp_enqueue_script('custom-main-scrolls', get_stylesheet_directory_uri() . '/js/custom-main-scrolls.js', array('jquery'), '1.0', true);
    }
	if (is_shop()) {
        wp_enqueue_script('custom-shop-scrolls', get_stylesheet_directory_uri() . '/js/custom-shop-scrolls.js', array('jquery'), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scroll_scripts');
