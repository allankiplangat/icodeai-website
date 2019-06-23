<?php
/**
 * Template for displaying search forms in TheSaaS
 */

?>

<form class="input-group input-group-sm" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
	<input type="text" id="<?php echo esc_attr( uniqid( 'search-form-' ) ); ?>" class="form-control" name="s" placeholder="<?php esc_html_e( 'Search...', 'thesaasx' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
	<div class="input-group-addon">
		<span class="input-group-text"><i class="ti-search"></i></span>
	</div>
</form>
