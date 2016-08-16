<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bootstrapwp
 */

get_header(); ?>



<?php $bg_img = dwp_option('portfolio-banner-img', false, 'url');

$bg_url = '';

if ($bg_img != '') {
        $bg_url = "background-image: url('" . $bg_img . "')";
}

?>

<!-- ==== HEADERWRAP ==== -->
	<div class="pagewrap" style="<?php echo $bg_url; ?>";
	<header>
    <?php if (dwp_option('portfolio-banner-title', 'Header Text') != '') {
      echo '<h1>';
      echo dwp_option('portfolio-banner-title');
      echo '</h1>';
    } ?>
		</header>
	</div><!-- /headerwrap -->

<div class="container">
<div class="row">
	<div id="primary" class="col-lg-12">
		<main id="main" class="site-main" role="main">

      <?php
      $the_query = new WP_Query( array('post_type' => 'portfolio') ); ?>

      <?php if ( $the_query->have_posts() ) : ?>

        <div class="row">
          <div id="portfolio-items">

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <?php get_template_part( 'content', 'portfolio' ); ?>


              <?php endwhile; ?>
              <!-- end of the loop -->

            </div> <!-- #portfolio-items -->

          </div> <!-- .row -->


          <?php wp_reset_postdata(); ?>

        <?php else : ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->


</div>  <!-- row -->
</div>  <!-- container -->

<?php get_footer(); ?>
