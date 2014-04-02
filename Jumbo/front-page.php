<?php
/**
 * The template for the Front Page.
 *
 * @package Jumbo
 */

get_header(); ?>

  <div class="jumbotron">
      <div class="container">
        <div class="caption">
          <?php if(get_option('feature_title')) {
              echo "<h1>".get_option('feature_title')."</h1>";
            }?>
            <?php if(get_option('feature_description')) {
              echo "<p>".get_option('feature_description')."</p>";
            }?>
          
          <p><a class="btn btn-primary btn-lg" role="button" href=" <?php if(get_option('link_url')) {echo get_option('link_url');}?>">
            <?php if(get_option('link_cta')) {
              
              echo get_option('link_cta');
            }?>
          </a></p>
        </div>
      </div>
      <div class="banner-overlay"></div>
    </div>

    <div class="container marketing">
      <!-- Example row of columns -->
      <!-- Three columns of text below the carousel -->
      <div class="row text-center">
        <div class="col-lg-4">
          <?php 

            $page_id = get_option('featured_article_first');

            $page_data = get_page( $page_id );
            $default_attr = array(
              'class' => "img-circle"
            );

            echo get_the_post_thumbnail( $page_id, 'full', $default_attr); 

            echo '<h2>'. $page_data->post_title .'</h2>';

            echo $page_data->post_content;
          ?>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <?php 
            $page_id = get_option('featured_article_second');

            $page_data = get_page( $page_id );
            $default_attr = array(
              'class' => "img-circle"
            );

            echo get_the_post_thumbnail( $page_id, 'full', $default_attr); 

            echo '<h2>'. $page_data->post_title .'</h2>';

            echo $page_data->post_content;
          ?>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <?php 
            $page_id = get_option('featured_article_third');

            $page_data = get_page( $page_id );
            $default_attr = array(
              'class' => "img-circle"
            );

            echo get_the_post_thumbnail( $page_id, 'full', $default_attr); 

            echo '<h2>'. $page_data->post_title .'</h2>';

            echo $page_data->post_content;
          ?>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        
        <div class="col-md-7">
          <h2 class="featurette-heading"><?php
              echo get_option('feat1_reg_title'); 
           ?> <span class="text-muted"><?php echo get_option('feat1_muted_title'); ?></span></h2>
          <p class="lead"><?php echo get_option('feat1_desc'); ?></p>
        </div>
        <div class="col-md-5">
          <img width="500" height="500" class="featurette-image img-responsive" src="<?php echo get_option('feat1_img'); ?>" alt="<?php echo get_option('feat1_reg_title'); ?> image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="<?php echo get_option('feat2_img'); ?>" alt="<?php echo get_option('feat2_reg_title'); ?> image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading"><?php echo get_option('feat2_reg_title'); ?> <span class="text-muted"><?php echo get_option('feat2_muted_title'); ?></span></h2>
          <p class="lead"><?php echo get_option('feat2_desc'); ?></p>
        </div>
      </div>


      <!-- /END THE FEATURETTES -->
<?php /** get_sidebar(); */ ?>
<?php get_footer(); ?>