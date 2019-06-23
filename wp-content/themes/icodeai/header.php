<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 */

get_template_part( 'include/view/global/head' );
?>

<body <?php body_class(); ?>>

<?php

thesaasx_get_layout('navbar');
thesaasx_get_layout('header');

?>

	<!-- Main Content -->
	<main class="main-content">
