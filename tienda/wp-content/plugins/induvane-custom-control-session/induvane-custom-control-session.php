<?php

/*
Plugin Name: InduVane Custom Control Sesion
Description: Este pluguin controla la sesion de un usuario logueado restringiendo ciertas paginas si quiere entrar con la misma sesión en otro navegador o dispositivo.
Version: 1.0
Author: Damian Rojas
*/

// Verifica si el usuario está logueado, y si no esta logueado restringe algunas páginas.

function induvane_custom_control_session() {
    global $post;

    // Verificar si el objeto $post existe y tiene un ID
    if (isset($post) && !empty($post->ID)) {
        $current_page_id = $post->ID;

        $restricted_page_ids = array(6, 7, 9);
        if (function_exists('wc_get_page_id')) {
            $shop_page_id = wc_get_page_id('shop');
            if ($shop_page_id && !in_array($shop_page_id, $restricted_page_ids, true)) {
                $restricted_page_ids[] = $shop_page_id;
            }
        }

        $is_protected_page = in_array($current_page_id, $restricted_page_ids, true);
        $is_protected_product = is_singular('product')
            || is_post_type_archive('product')
            || is_shop()
            || is_tax(array('product_cat', 'product_tag'));


        if (!is_user_logged_in() && ($is_protected_page || $is_protected_product)) {
            wp_redirect(wp_login_url());
            exit(); 
        }
    }
}

add_action('template_redirect', 'induvane_custom_control_session');

?>
