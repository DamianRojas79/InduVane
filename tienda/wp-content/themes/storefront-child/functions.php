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

/**
 * Personalización el header de Storefront solo en el home:
 * quitar branding, menú y buscador, y agregar el texto destacado de InduVane.
 */
add_action( 'wp', 'induvane_customizar_header_home', 20 );

function induvane_customizar_header_home() {
	if ( ! is_front_page() && ! is_home() ) {
		return;
	}

	// Eliminar branding (nombre/logo de la tienda).
	remove_action( 'storefront_header', 'storefront_site_branding', 20 );

	// Eliminar navegación principal y secundaria.
	remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
	remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
	remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
	remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );

	// Eliminar buscador de productos.
	remove_action( 'storefront_header', 'storefront_product_search', 40 );

	// Agregar bloque de bienvenida al header.
	add_action( 'storefront_header', 'induvane_header_destacado', 25 );
}

function induvane_header_destacado() {
	?>
	<div class="induvane-header-hero">
		<div class="induvane-header-copy">
			<p class="induvane-header-eyebrow">Bienvenida a InduVane 💕</p>
			<p class="induvane-header-title">Moda que te acompaña todos los días.</p>
			<p class="induvane-header-subtitle">Entrá y descubrí lo que tenemos para vos.</p>
		</div>
	</div>
	<?php
}

?>
