<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Jumbo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?> 
              <img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'> 
            <?php else : ?>
               <?php bloginfo( 'name' ); ?>
            <?php endif; ?>
          </a>
        </div>
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <?php //if(of_get_option('search_bar', '1')) {?>
            <form class="navbar-form navbar-right pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
              <div class="form-group">
                <div class="input-group">
                  <input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                  <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                </div>  
              </div>
            </form>
          <?php //} ?>
          <?php wp_nav_menu( array(

            'theme_location' => 'primary', 
            'menu_class' => 'nav navbar-nav pull-right', 
            'walker' => new wp_bootstrap_navwalker() )
          ); ?>
        </div> <!--/.navbar-collapse -->
      </div>
</div>

