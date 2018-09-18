<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
      <div id="wrapper" class="hfeed">

         <header id="header" class="" role="banner">

            <section class="branding-up">
               <div class="container">
                  <div class="row">
                     <div class="col">
                        <!-- <img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>"> -->
                        <img alt="" src="<?php header_image(); ?>" width="200">
                     </div>
                     <div class="col text-right">
                        <?php wp_nav_menu(array( 'theme_location' => 'menu-language', 'container' => 'ul', 'menu_class' => 'nav float-right' )); ?>
                     </div>
                  </div>
               </div>
            </section>
            
            <section class="branding">
               <div class="container">
                  <div class="row">
                     <div class="col-2 col-lg-1">
                        
                        <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                           echo '<img class="custom-logo" src="'. esc_url( $logo[0] ) .'">';
                        } else {
                           echo '<img class="custom-logo" src="'. get_template_directory_uri() . '/img/custom-logo.png' .'">';
                        } ?>
                        
                     	<?php //wppa_the_custom_logo(); ?>
                     </div>
                     <div class="col">
                        <div id="site-title">
                           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
                        </div>
                        <div id="site-description"><?php bloginfo( 'description' ); ?></div>
                     </div>
                     <div class="col-lg-4">
                        
                        <div class="container">
                           <div class="row">
                              <div class="col menu-social">
                                 <!-- <p>Social</p> -->
                                 <?php wp_nav_menu( array( 'theme_location' => 'menu-social', 'container' => 'ul', 'menu_class' => 'nav')); ?>
                              </div>
                              <div class="w-100 d-none d-lg-block"></div>
                              <div class="col search-form">
                                 <?php get_search_form(); ?>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </section>

            <nav class="menu-main" role="navigation">
               <div class="container">
                  <div class="row justify-content-center">
                     <label for="show-menu-main" class="show-menu-main">Menu</label>
                     <input type="checkbox" id="show-menu-main" role="button">
                     <?php wp_nav_menu(array( 'theme_location' => 'menu-main', 'container' => 'ul', 'menu_class' => 'nav' )); ?>
                  </div>
                  <!-- <div class="row">
                     <?php wp_nav_menu(array( 'theme_location' => 'menu-secondary', 'container' => 'ul', 'menu_class' => 'nav' )); ?>
                  </div> -->
               </div>
            </nav>

         </header>

         <div id="container">