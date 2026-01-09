## InduVane - Tienda Virtual

![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/induVane2.png)

![Status](https://img.shields.io/badge/STATUS-EN%20DESARROLLO-green)
![License](https://img.shields.io/badge/License-MIT-green.svg)
![Maintained](https://img.shields.io/badge/Maintained-Yes-brightgreen)

![WordPress](https://img.shields.io/badge/WordPress-6.x-blue?logo=wordpress)
![WooCommerce](https://img.shields.io/badge/WooCommerce-8.x-purple?logo=woocommerce)
![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)
![Docker](https://img.shields.io/badge/Docker-Ready-blue?logo=docker)
![MySQL](https://img.shields.io/badge/MySQL-8.x-blue?logo=mysql)
![Apache](https://img.shields.io/badge/Apache-2.4-red?logo=apache)


## Índice

  

*[Título e imagen de portada](#Título-e-imagen-de-portada)

  

*[Insignias](#insignias)

  

*[Índice](#Todo-list)

  

*[Descripción del proyecto](#descripción-del-proyecto)

  

*[Estado del proyecto](#estado-del-proyecto)

  

*[Características de la aplicación y demostración](#características-de-la-aplicación-y-demostración)

  

*[Acceso y ejecución del proyecto](#acceso-al-proyecto)

  

*[Tecnologías utilizadas](#tecnologías-utilizadas)  

*[Personas-Desarrolladores del Proyecto](#personas-desarrolladores)

  

*[Licencia](#licencia)

  

*[Conclusión](#conclusión)

  
  
  

## Descripción del Proyecto

 🌸 **InduVane** es una tienda online de moda femenina desarrollada con **WordPress + WooCommerce**, enfocada en la personalización del diseño, la mejora de la experiencia de usuario y la optimización del proceso de compra.<br> 
 
El proyecto incluye:<br>
* Ajustes de diseño y estilos visuales
* Personalizaciones del tema (Storefront / tema hijo)
* Creación de Plugins personalizados 
* Mejoras en usabilidad, estructura y presentación de productos

✨ InduVane representa una forma de vivir la moda con elegancia, sencillez y autenticidad.
 
 
 
 <br>



## Estado del Proyecto

![Badge en Desarollo](https://img.shields.io/badge/STATUS-EN%20DESAROLLO-green)


## Características de la aplicación y demostración
  

🔨 **Funcionalidades del proyecto**

**👤 Registro de Usuarios** <br>

El sistema permite el registro de usuarios públicos, habilitando que cualquier persona pueda crear una cuenta en la tienda.
El proceso de registro y acceso está gestionado mediante el plugin LoginPress, el cual fue configurado y personalizado para mantener coherencia con la identidad visual de InduVane.

<img 
  src="https://github.com/DamianRojas79/InduVane/blob/main/images_git/registro_usuario.png"
  alt="Landing Page InduVane"
  width="40%">
<br><br>

**🔐 InduVane Custom Control Sesión (Plugin)**

Se creo el el Pluguin **InduVane Custom Control Sesión**  que permite controlar y restringir el uso simultáneo de una misma cuenta de usuario en múltiples navegadores o dispositivos.

El plugin valida la sesión activa de un usuario logueado y bloquea el acceso a determinadas páginas cuando se detecta un intento de reutilizar la misma sesión desde otro entorno, reforzando la seguridad y el control de acceso dentro del sistema.

Esta funcionalidad mejora la gestión de sesiones y evita comportamientos no deseados, garantizando una experiencia de uso más segura y controlada.

Versión: 1.0 <br>
Autor: Damian Rojas<br>

![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/plugin-control-sesion.png)<br><br>

<br><br>


**🎨 Storefront Child (Tema Hijo)**

Se creó el tema hijo Storefront Child con el objetivo de escalar y personalizar la tienda sin modificar el tema base Storefront. Este enfoque permite incorporar mejoras visuales y funcionales específicas del proyecto InduVane, manteniendo la compatibilidad con WooCommerce y facilitando futuras actualizaciones.

El tema hijo concentra los estilos personalizados, ajustes de diseño y funcionalidades propias, asegurando una estructura ordenada, mantenible y preparada para la evolución del sistema.

![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/tema-storeFront-child.png)

<br><br>

**📄 Landing Page de Registro**

Se desarrolló una landing page orientada a la conversión, enfocada en el registro de nuevos usuarios en la tienda, utilizando el plugin SeedProd. La página fue diseñada para dirigir al visitante de forma directa al alta de cuenta, priorizando llamados a la acción claros y una estética alineada con la identidad de InduVane.

<img 
  src="https://github.com/DamianRojas79/InduVane/blob/main/images_git/landingpage1.png"
  alt="Landing Page InduVane"
  width="60%">
<img 
  src="https://github.com/DamianRojas79/InduVane/blob/main/images_git/landingpage2.png"
  alt="Landing Page InduVane"
  width="60%">

<br><br>


**🧩 Shortcode – Carrusel de últimos productos**

Se creó un shortcode personalizado que muestra los últimos 5 productos publicados de WooCommerce en formato carrusel, utilizando WP_Query para obtener los productos más recientes.

La funcionalidad presenta:

- Visualización en 3 columnas (responsive a 2 y 1 según pantalla)
- Renderizado exclusivo de imagen destacada y nombre del producto
- Autoplay automático con desplazamiento cada 5 segundos
- Scroll suave con control de interacción del usuario
- Estructura HTML, CSS y JavaScript desacoplada para fácil mantenimiento

El shortcode puede insertarse en cualquier página o sección mediante:

[induvane_carrusel_ultimos]


![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/shotcode-carrusel.png)

<br><br>

**🧩 Encabezado personalizado en página de Inicio**

Se implementó una función personalizada utilizando add_action que permite modificar el encabezado del sitio cuando el usuario se encuentra en la página de Inicio.
En esta vista se reemplaza el menú principal estándar por un encabezado específico y optimizado para la home, diseñado como una página de inicio especializada, manteniendo el encabezado tradicional en el resto de las páginas.

Esta solución permite diferenciar visual y funcionalmente la página principal, mejorando la experiencia de navegación y el enfoque del contenido inicial.

![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/header-home.png)

<br><br>

**👤 Personalización de página Mi Cuenta**

Se implementó una función personalizada en WooCommerce que modifica la página Mi Cuenta, ajustando tanto el texto principal como el panel de navegación.
Mediante el uso del filtro woocommerce_account_menu_items, se eliminan secciones no utilizadas (como Descargas) y se redefine el orden del menú para mejorar la usabilidad y la experiencia del usuario.


![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/micuenta-personalizado.png)

<br><br>

**🦶 Personalización de pie de página (Footer)**

Se implementó una personalización del footer en Storefront mediante filtros y acciones de WordPress.
Se reemplazó el crédito por defecto utilizando gettext y remove_action/add_action, incorporando el autor del sitio y un bloque de iconos de redes sociales (Facebook, Instagram y WhatsApp), manteniendo compatibilidad con WooCommerce y accesibilidad básica.

![image alt](https://github.com/DamianRojas79/InduVane/blob/main/images_git/pie-pagina.png)

<br><br>

## Acceso y ejecución del proyecto
**Requisitos**
- Tener instalado Docker y Docker Compose 

**Estructura relevante**
- tienda_docker/docker-compose.yml: definicion de servicios (WordPress, MySQL, phpMyAdmin)
- tienda_docker/.env`: variables de entorno y rutas de volumenes.
- tienda/`: codigo de WordPress (se monta como volumen).
- tienda_base/`: datos de MySQL (se monta como volumen)


**Levantar el proyecto**
1) Revisar `tienda_docker/.env` y ajustar rutas de `VOLUMEN_APP` y `VOLUMEN_BASE` si corresponde.<br>
   Nota: evitar espacios luego del `=` en esas variables para que Docker las lea bien.
2) Desde la carpeta `tienda_docker`:
```bash
docker compose --env-file .env up -d
```
3) Esperar a que WordPress termine de iniciar.

**Accesos**
- Sitio WordPress: http://localhost:9003
- phpMyAdmin: http://localhost:8000
- MySQL: `localhost:3306` (usuario y password segun `.env`)

**Persistencia de datos (volumenes)**
El proyecto usa bind mounts para persistir datos fuera de los contenedores:
- `VOLUMEN_APP` -> `/var/www/html` (codigo y uploads de WordPress) en `tienda/`
- `VOLUMEN_BASE` -> `/var/lib/mysql` (datos de base) en `tienda_base/`

Mientras esas carpetas existan, los datos se conservan aunque reinicies o borres contenedores.

**Comandos útiles**
- Ver estado: `docker compose ps`
- Ver logs: `docker compose logs -f`
- Detener: `docker compose down`
- Detener y borrar datos: `docker compose down -v` (borra todo lo de `tienda_base/`)

  


  

## :heavy_check_mark: Tecnologías Utilizadas

- **Docker**<br>

- **Docker Compose**<br>

- **Wordpress**<br>

- **PHP**<br>

- **Apache**<br>

- **MySQL**<br>

- **Html**<br>

- **CSS**<br>



## Personas Desarrolladoras del Proyecto

[<img src="https://avatars.githubusercontent.com/u/135189204?s=400&u=932907d7db09c6472e34c43c6b5ed27be7342bf4&v=4" width=115><br><sub> Damian Rojas </sub>](https://github.com/DamianRojas79)

  

## Licencia📄

  

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

  
Este proyecto cuenta con licencia conforme a los términos de la licencia MIT.  
  
## Conclusión
Este proyecto deja una base funcional de e-commerce con WordPress y WooCommerce, preparada para desarrollo local con Docker y persistencia de datos. A futuro, se puede seguir fortaleciendo con mejoras de performance, ajustes de diseno, nuevas funcionalidades y despliegue en un entorno productivo, manteniendo una estructura clara y reproducible.
  
