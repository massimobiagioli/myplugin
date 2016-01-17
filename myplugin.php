<?php
/*
Plugin Name: My Plugin
Description: Esempio di plugin 
Author: Massimo Biagioli
Version: 0.1
*/

require_once plugin_dir_path(__FILE__) . '/myplugin_dataprovider.php';

function myplugin_shortcode() {    
    $toReturn = 'This is <b>My Plugin!</b>';
    $toReturn .= '<ul>';
    foreach (myplugin_dataprovider::getInstance()->getData() as $key => $value) {
        $toReturn .= "<li><b>$key</b> = $value</li>";
    }
    $toReturn .= '</ul>';
    
    return $toReturn;
}

function myplugin_register_shortcode() {
    add_shortcode('myplugin', 'myplugin_shortcode');
}

function myplugin_admin_menu() {    
    add_menu_page (
        'My Plugin',
        'Impostazioni',
        'manage_options',
        'myplugin-page-admin',
        'myplugin_page_admin',
        plugin_dir_url( __FILE__ ).'icons/myplugin.png'
    );
}

function myplugin_page_admin() {
   ?>
   <div>Impostazioni di My Plugin</div>
   <?php
}

add_action('init', 'myplugin_register_shortcode');
add_action('admin_menu', 'myplugin_admin_menu');

?>
