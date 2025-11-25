<?php

// Cambiar menú de "Mi cuenta" en WooCommerce
add_filter( 'woocommerce_account_menu_items', 'induvane_modificar_menu_mi_cuenta', 10, 1 );

function induvane_modificar_menu_mi_cuenta( $items ) {

    // 1) Eliminar "Descargas"
    // Clave del item descargas: 'downloads'
    if ( isset( $items['downloads'] ) ) {
        unset( $items['downloads'] );
    }

    // 2) Cambiar el orden
    // Claves habituales:
    // 'dashboard'        => Escritorio
    // 'orders'           => Pedidos
    // 'downloads'        => Descargas (ya la sacamos)
    // 'edit-address'     => Direcciones
    // 'edit-account'     => Detalles de la cuenta
    // 'customer-logout'  => Salir

    $nuevo_orden = array();

    // Ajustá el orden como quieras:
    $nuevo_orden['dashboard']       = $items['dashboard'];       // Escritorio
    $nuevo_orden['edit-account']    = $items['edit-account'];    // Detalles de la cuenta
    $nuevo_orden['edit-address']    = $items['edit-address'];    // Direcciones
    $nuevo_orden['orders']          = $items['orders'];          // Pedidos
    $nuevo_orden['customer-logout'] = $items['customer-logout']; // Salir

    return $nuevo_orden;
}



?>