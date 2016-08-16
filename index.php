<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootstrapwp
 */

get_header(); ?>

<?php $bg_img = dwp_option('hp-banner-img', false, 'url');

$bg_url = '';

if ($bg_img != '') {
        $bg_url = "background-image: url('" . $bg_img . "')";
}

?>

<!-- ==== HEADERWRAP ==== -->
	<div class="pagewrap" style="<?php echo $bg_url; ?>";
	<header>
    <?php if (dwp_option('hp-banner-title', 'Header Text') != '') {
      echo '<h1>';
      echo dwp_option('hp-banner-title');
      echo '</h1>';
    } ?>
		</header>
	</div><!-- /headerwrap -->

<div class="jumbotron">
        <h1>Jumbotron</h1>

      </div>
<div class="container">
<div class="row">
	<div id="primary" class="col-lg-8 col-md-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php bootstrapwp_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
