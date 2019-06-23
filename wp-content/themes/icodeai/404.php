<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_template_part( 'include/view/global/head' );
?>

<body <?php body_class('layout-centered bg-gray'); ?>>

	<!-- Main Content -->
	<main class="main-content text-center pb-lg-8">
		<div class="container">
			
			<h1 class="display-1 text-muted mb-7"><?php esc_html_e( 'Page Not Found', 'thesaasx') ?></h1>
			<p class="lead"><?php esc_html_e( 'Seems you\'re looking for something that doesn\'t exist.', 'thesaasx') ?></p>
			<br>
			<button class="btn btn-secondary mr-2" type="button" onclick="window.history.back();"><?php esc_html_e( 'Go back', 'thesaasx') ?></button>
			<a class="btn btn-secondary" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Return Home', 'thesaasx') ?></a>

		</div>
	</main><!-- /.main-content -->

	<?php wp_footer(); ?>

</body>
</html>
