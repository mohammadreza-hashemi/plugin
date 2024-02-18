<?php

add_action('init', 'register_my_product_post_type');

function register_my_product_post_type()
{
    $labels = array(
        'name' => 'محصولات',
        'singular_name' => 'محصول',
        'add_new' => 'محصول جدید',
        'add_new_item' => 'محصول جدید',
        'new_item' => 'محصول جدید',
        'edit_item' => 'وییرایش محصول',
        'view_item' => 'نمایش مجصول',
        'all_item' => 'همه مجصولات',
        'search_item' => 'جست و جوی محصولات',
        'parent_item_colon' => 'محصولات والد',
        'not_found' => 'هیچ محصولی پیدا نشد',
        'not_found_id_search' => 'در زبباله وجود ندارد',
    );
    $arrgs = array(
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product'),
        'capebility_type' => 'post',
        'has_archived' => true,//nested
        'hierarchical' => false,
        'menue_poosition' => 5,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon  ' => 'dashicons_card',
        'taxonomies' => array('post_tag', 'category'),

    );

    register_post_type('my_product_post_type', $arrgs);
}


add_action('init', 'register_my_product_taxonamies');
function register_my_product_taxonamies()
{
    $labels = array(
        'name' => 'نوع محصولات',
        'singular_name' => 'نوع محصول',
        'add_new' => 'نوع محصول جدید',
        'add_new_item' => 'نوع محصول جدید',
        'edit_item' => ' وییرایش نوع محصول',
        'view_item' => 'نمایش نوع مجصول',
        'all_item' => 'همه انواع مجصولات',
        'search_item' => 'جست و جویانواع محصولات',
        'parent_item' => ' والد',
        'parent_item_colon' => ' والد',
    );

    $arrgs = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => true,
        'show_in_nav_menu' => true,
        'hierarchical' => true,
        'show_tagcloud' => true,
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_term' => 'edit_posts',
        ),
        'rewrite' => array('slug' => 'product_type'),
    );
    register_taxonomy('my-taxonamie', array('my_product_post_type','post'), $arrgs);
}