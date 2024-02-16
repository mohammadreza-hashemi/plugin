<?php
$error = '';

if (isset($_POST['button'])) {

    $name = sanitize_text_field($_POST["name"]);
    $phone = sanitize_text_field($_POST["phone"]);
    $nonce = $_POST['add_order'];

    if (!wp_verify_nonce($nonce, 'add_order_action')) {
        return $error = 'nonce is invalid';
    }

    if (empty($name) || strlen($name) <= 3) {
        return $error = 'name is invalid !';
    }

    $pattern = "/^(?:98|\+98|0)?9[0-9]{9}$/";
    if (empty($phone) || !preg_match($pattern, $phone)) {
        return $error = 'phone is invalid';
    }
//
    $user = get_user_by('login', $phone);

    if (!$user) {
        $user = wp_create_user($phone, $name);
    }

    $userId = $user->ID;
    $order_data = array(
        'status' => 'completed',
        'customer_id' => $userId,
    );

    $order = wc_create_order($order_data);
    $user_order = wc_get_order($order->get_id());
    $product = get_page_by_title('product 1', null, 'product');
    $add_product_to_user_order = $user_order->add_product(wc_get_product($product),1);

}


?>

