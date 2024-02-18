<?php


//add_action('init', 'add_table_to_db');
//function add_table_to_db()
//{ //IF TABLE NOT EXIST
//    global $wpdb;
//    $table_name=$wpdb->prefix.'my_order_table';
//    $charset_collate = $wpdb->get_charset_collate();
//    $sql = "CREATE TABLE $table_name (
//        id mediumint(9) NOT NULL AUTO_INCREMENT,
//        email text NOT NULL,
//        PRIMARY KEY  (id)
//    ) $charset_collate;";
//    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
//    dbDelta($sql);
//}

add_action('rest_api_init', 'register_api_route');
function register_api_route()
{

    register_rest_route('wp/v2', 'order', array(
            'methods' => 'POST',
            'callback' => 'create_order',
        )
    );
}

function create_order(WP_REST_Request $request)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_order_table';
    $parameters = $request->get_params();
    $email = $parameters['email'];

    if ($email) {
        $insert = $wpdb->insert($table_name, array(
            "email" => $email,
        ));
        if ($insert) {
            return rest_ensure_response('You are registered');
        } else {
            return rest_ensure_response('Please complete form');
        }
    }
}

add_action('curl', 'my_curl');
function my_curl()
{

    $url = 'http://localhost/wordpress/wp-json/wp/v2/order'; // your url should like: http://host.com/wp-json/v1/'.$key

    $ch = curl_init();   //curl initialisation
    curl_setopt($ch, CURLOPT_URL, $url); // add url
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // get return value
    curl_setopt($ch, CURLOPT_POST, true); // false for GET request
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('email', 'ppp')); // add post data
//    curl_setopt($crl, CURLOPT_HTTPHEADER, array(
//            'Content-Type: ' => 'application/json'
//        )
//    );
    $output = curl_exec($ch);
    curl_close($ch); // close curl
    $error = curl_error($ch); // get error
    if (!$error) {
        echo 'done';
        die();
    } else {
        echo 'false';
        die();
    }


}

do_action('curl');