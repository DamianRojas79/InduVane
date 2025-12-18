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
			<p class="induvane-header-subtitle"> 
			<a href="http://localhost:9003/tienda/" style="text-decoration: none; color: inherit;">
				Entrá y descubrí lo que tenemos para vos.
			</a>
		
		
			</p>
			
		</div>
	</div>
	<?php
}

/**
 * Quitar imagen destacada del encabezado solo en la página "Sobre mi".
 */
add_action( 'wp', 'induvane_sobre_mi_sin_imagen_destacada', 25 );

function induvane_sobre_mi_sin_imagen_destacada() {
	if ( ! is_page( array( 'sobre-mi', 'sobre mi', 'sobre mí' ) ) ) {
		return;
	}

	// Reemplaza el header de Storefront por uno sin imagen destacada para esta página.
	remove_action( 'storefront_page', 'storefront_page_header', 10 );
	add_action(
		'storefront_page',
		function () {
			?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
			<?php
		},
		10
	);
}


/**
 * Shortcode: [induvane_carrusel_ultimos]
 * - 3 columnas visibles
 * - Últimos 5 productos
 * - Solo imagen + nombre
 * - Autoplay cada 5s (loop)
 */
add_shortcode('induvane_carrusel_ultimos', function($atts){
  if ( ! class_exists('WooCommerce') ) return '';

  $a = shortcode_atts([
    'titulo' => 'Últimos ingresos',
  ], $atts);

  $q = new WP_Query([
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  if ( ! $q->have_posts() ) return '';

  $uid = 'induvane_car_' . wp_generate_password(6, false, false);

  ob_start(); ?>
  <section class="induvane-carousel" id="<?php echo esc_attr($uid); ?>">
    <div class="induvane-carousel__head">
      <h2 class="induvane-carousel__title"><?php echo esc_html($a['titulo']); ?></h2>
    </div>

    <div class="induvane-carousel__viewport" aria-label="Carrusel de productos">
      <div class="induvane-carousel__track">
        <?php while($q->have_posts()): $q->the_post(); ?>
          <article class="induvane-carousel__item">
            <a class="induvane-carousel__img" href="<?php the_permalink(); ?>">
              <?php
                if ( has_post_thumbnail() ) {
                  echo get_the_post_thumbnail(get_the_ID(), 'woocommerce_thumbnail');
                }
              ?>
            </a>
            <div class="induvane-carousel__body">
              <h3 class="induvane-carousel__name">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <script>
  (function(){
    const root = document.getElementById('<?php echo esc_js($uid); ?>');
    if(!root) return;

    const viewport = root.querySelector('.induvane-carousel__viewport');
    const track    = root.querySelector('.induvane-carousel__track');
    const items    = root.querySelectorAll('.induvane-carousel__item');
    if(!viewport || !track || items.length < 2) return;

    function getGap(){
      const style = getComputedStyle(track);
      return parseFloat(style.columnGap || style.gap || 0) || 0;
    }

    function slideAmount(){
      const item = items[0];
      const gap  = getGap();
      return item.getBoundingClientRect().width + gap;
    }

    let index = 0;

    function visibleCount(){
      // Si cambia responsive, el "visible" cambia (3/2/1)
      const w = window.innerWidth;
      if (w <= 520) return 1;
      if (w <= 900) return 2;
      return 3;
    }

    function next(){
      const amt = slideAmount();
      const vis = visibleCount();
      const maxIndex = items.length - vis;
      if (maxIndex <= 0) return;

      index++;
      if (index > maxIndex) index = 0;
      viewport.scrollTo({ left: index * amt, behavior: 'smooth' });
    }

    let timer = setInterval(next, 5000);

    // Evita pelear con el usuario si hace scroll manual
    function pause(){ clearInterval(timer); }
    function resume(){ clearInterval(timer); timer = setInterval(next, 5000); }

    viewport.addEventListener('pointerdown', pause);
    viewport.addEventListener('pointerup', resume);
    viewport.addEventListener('mouseenter', pause);
    viewport.addEventListener('mouseleave', resume);
    viewport.addEventListener('touchstart', pause, {passive:true});
    viewport.addEventListener('touchend', resume);

    window.addEventListener('resize', () => {
      const amt = slideAmount();
      viewport.scrollTo({ left: index * amt, behavior: 'auto' });
    });
  })();
  </script>
  <?php
  return ob_get_clean();
});


?>
