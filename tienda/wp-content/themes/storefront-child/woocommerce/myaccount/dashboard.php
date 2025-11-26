<?php
defined( 'ABSPATH' ) || exit;

$current_user = wp_get_current_user();
$nombre = $current_user->first_name ? $current_user->first_name : $current_user->display_name;
?>

<!-- <div class="induvane-dashboard" style="padding: 10px 0;"> -->

<div class="induvane-myaccount-dashboard">
    
    <p style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">
        ¡Hola <?php echo esc_html( $nombre ); ?>! Gracias por ser parte de <strong>InduVane</strong>.
    </p>

    <!-- <p style="margin-bottom: 15px;"> -->
    <p class="induvane-myaccount-text">
        Desde tu cuenta tenés el control total de tus compras: revisá tus pedidos, actualizá tus direcciones
        y mantené tus datos siempre al día.
    </p>

    <p style="margin-top: 20px; font-size: 15px; opacity: 0.9;">
        ¿No sos <?php echo esc_html( $nombre ); ?>?
        <a href="<?php echo esc_url( wc_logout_url() ); ?>">Hacé clic para cerrar sesión</a>.
    </p>

</div>

