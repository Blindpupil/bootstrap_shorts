<?php
/**
 * The template for displaying categories posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package get_schwifty
 */

get_header(); ?>
<?php
  // Header Context
  $setCurrentCat = get_queried_object();
  $getCurrentCat = get_option('category_' . $setCurrentCat->cat_ID);
?>

  <div class="container my-3">
    <?php custom_breadcrumbs('<span class="ion-home"></span>'); ?>
  </div>

  <div class="d-block">
    <div class="container">
      <?php echo category_description();  ?>
    </div><!-- end of .container -->
    <div class="container">
      <?php echo $getCurrentCat['content']; ?>
    </div>
  </div><!-- end of d-block -->

  <div class="container my-4">
    <div class="py-3 mb-4 text-center border border-left-0 border-right-0">
      <h4 class="m-0"><?php echo get_cat_name($setCurrentCat->cat_ID); ?> <?php _e('Articles', 'get_schwifty'); ?></h4>
    </div>
    <div class="row row-related-articles align-items-stretch" data-loadable-content="true">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_widget('ArticleCard'); ?>
      <?php endwhile; endif; ?>
    </div><!-- end of .row -->

    <div class="d-flex justify-content-center py-3">
      <div class="col-4 flex">
        <a href="#" class="btn btn-lg btn-block btn-outline-secondary"><?php _e('Load More', 'get_schwifty'); ?></a>
      </div>
    </div><!-- end of .text-center -->
  </div><!-- end of .container -->
  <?php the_widget('Subscribe', array( 'class' => 'bg-secondary text-light py-4')); ?>
<?php get_footer();
