<?php

add_action('init', 'add_books_post_type');


function add_books_post_type()
{

    $lables = array(
        'name' => 'کتاب ها',
        'singular_name' => 'کتاب',
        'menu_name' => 'کتاب ها',
        'name_admin_bar' => 'کتاب',
        'add_new' => 'افزودن کتاب',
        'add_new_item' => 'اضاافه کردن کتاب جدید',
        'edit_item' => 'ویرایش کتاب',
        'new_item' => 'کتاب جدید',
        'all_item' => 'همه کتاب ها',
        'search_item' => 'جست  و جوی کتاب',
        'parent_iitem_colomn' => 'مادر',
        'not_found' => 'پیدا نشد',
        'not_found_in_trash' => 'در سطل زباله پیدا نشد',

    );
    register_post_type('artist', array(
        'public' => true,
        'labels' => $lables,
        'exclude_from_search'=>true,
        'publicly_queriable'=>true,
        'show_ui'=>true,
        'show_in_nav_menu'=>true,
        'menu_position'=>85,
        'menu_icon'=>'dashicons_wellcome_learn_more',
        'has_archive' => true,//flush rewrite role  flash permalink
//        'capability_type'=>array('book','books'),
        'supports' => array('title', 'excerpt', 'custom_fields', 'comments'),
        'rewrite' => array('slug' => 'ketabha'),
        'taxonomies' => array('post_tag', 'category'),
    ));
}