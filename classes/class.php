<?php

class WLTICKER
{
    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'wl_load_textdomain'));
        add_action('admin_enqueue_script', array($this, 'admin_enqueue_script'));
        add_action('wp_enqueue_script', array($this, 'wp_enqueue_script'));
    }

    public function wl_load_textdomain()
    {
        load_plugin_textdomain(wlticker_plugin_name, 'false', 'wlticker/languages');
    }

    public function admin_enqueue_script($hook)
    {
        echo var_dump($hook);
    }

    public function wp_enqueue_script()
    {

    }


}