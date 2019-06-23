<?php
/**
 * The template for displaying the footer
 */
?>

	</main><!-- /.main-content -->

<?php

thesaasx_get_layout('footer');
wp_footer();
?>

<?php if ( ! get_theme_mod( 'hide_scrolltop', true ) ): ?>
<!-- Scroll top -->
<button class="btn btn-circle btn-primary scroll-top"><i class="fa fa-angle-up"></i></button>
<?php endif; ?>

<!-- Offcanvas - Search -->
<div id="offcanvas-search" class="offcanvas bg-dark h-auto" data-animation="slide-down">
  <div class="row">
    <form class="col-md-8 mx-auto input-glass" action="/" method="get">
      <input class="form-control form-control-lg" type="text" name="s" placeholder="<?php esc_html_e( 'Search...', 'thesaasx') ?>" value="<?php the_search_query(); ?>">
    </form>
  </div>
</div>

</body>
</html>
