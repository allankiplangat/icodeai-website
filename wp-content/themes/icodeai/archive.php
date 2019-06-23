<?php
/**
 * The template for displaying archive pages
 */

$archive_type = get_theme_mod( 'blog_archive_type', 'grid' );

if ( isset( $_GET['blog_layout'] ) ) {
	$blog_layout = strtolower( $_GET['blog_layout'] );
	if ( in_array( $blog_layout, ['grid', 'list', 'classic'] ) ) {
		$archive_type = $blog_layout;
	}
}


get_header();
get_template_part( 'include/view/blog/archive', $archive_type );
get_footer();
