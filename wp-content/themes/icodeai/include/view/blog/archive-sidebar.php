<?php
/**
 * Template part for displaying posts in grid style.
 */

?>
<section class="section bg-light">
	<div class="container">
		<div class="row">

      <div class="col-md-8 col-xl-9">
        <div class="row gap-y">
					<?php
					if ( have_posts() ) :

						while ( have_posts() ) : the_post();
							$permalink = get_permalink();
							$title = get_the_title();
							$thumb = get_the_post_thumbnail_url( null, 'thesaasx-featured-image' );
							$cats = get_the_category();
							if ( empty( $title ) ) {
								$title = get_the_date();
							}
							?>
							<div class="col-md-6">
								<div id="post-<?php the_ID(); ?>" <?php post_class('card border hover-shadow-6 mb-6'); ?>>

									<?php if ( $thumb !== false ) : ?>
										<a href="<?php echo esc_url( $permalink ); ?>">
											<img class="card-img-top" src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>">
										</a>
									<?php endif; ?>

									<div class="p-6 text-center">
										<?php
										if ( ! empty( $cats ) ) {
											$url  = esc_url( get_category_link( $cats[0]->term_id ) );
											$name = esc_html( $cats[0]->name );
										  echo '<p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="' . $url . '">' . $name . '</a></p>';
										}
										?>

										<h5 class="mb-0"><a class="text-dark" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h5>
									</div>

								</div>
							</div>
							<?php
						endwhile;

					else :
						get_template_part( 'include/view/blog/post-none' );
					endif;
					?>
				</div>
				<?php get_template_part( 'include/view/blog/pagination' ); ?>
			</div>

			<div class="col-md-4 col-xl-3">
				<?php get_template_part( 'include/view/blog/sidebar' ); ?>
			</div>

		</div>



	</div>
</section>
