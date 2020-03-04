<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?> ontouchstart>
      <div id="wrapper" class="hfeed">
         <header id="header" class="" role="banner">

         <div class="it-header-wrapper">
           <div class="it-header-slim-wrapper">
             <div class="container">
               <div class="row">
                 <div class="col-12">
                   <div class="it-header-slim-wrapper-content">
                     <!-- <a class="d-none d-lg-block navbar-brand" href="#"> -->
                        <img class="header-slim-img" alt="" src="<?php header_image(); ?>">
                     <!-- </a> -->
                     <?php if ( has_nav_menu( 'menu-language' ) ) { 
                        echo '<div class="header-slim-right-zone">';
                        echo '<label for="show-menu-lingua" class="show-menu-lingua">&#8942;</label><input type="checkbox" id="show-menu-lingua" role="button">';
                        wp_nav_menu(array( 'theme_location' => 'menu-language', 'container' => 'ul', 'menu_class' => 'nav float-right' ));
                        echo '</div>';
                     } ?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="it-nav-wrapper">
             <div class="it-header-center-wrapper">
               <div class="container">
                 <div class="row">
                   <div class="col-12">
                     <div class="it-header-center-content-wrapper">
                       <div class="it-brand-wrapper">
                         <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
                           <?php 
                              $custom_logo_id = get_theme_mod( 'custom_logo' );
                              $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                              if ( has_custom_logo() ) {
                                 echo '<img class="icon" src="'. esc_url( $logo[0] ) .'" alt="'. esc_html( get_bloginfo( 'name' ) ) .'">';
                              } else {
                                 echo '<img class="icon" src="'. get_template_directory_uri() . '/img/custom-logo.png' .'" alt="'. esc_html( get_bloginfo( 'name' ) ) .'">';
                           } ?>
                           <div class="it-brand-text">
                             <h2 class="no_toc"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
                             <h3 class="no_toc d-none d-md-block"><?php bloginfo( 'description' ); ?></h3>
                           </div>
                         </a>
                       </div>
                       <div class="it-right-zone">
                         <div class="it-socials d-none d-md-flex">
                           <?php if ( has_nav_menu( 'menu-social' ) ) {
                              wp_nav_menu( array( 'theme_location' => 'menu-social', 'container' => 'ul', 'menu_class' => 'nav'));
                           } ?>
                         </div>
                         <div class="it-search-wrapper">
                           <?php get_search_form(); ?>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <div class="it-header-navbar-wrapper">
               <nav class="menu-main" role="navigation">
               <div class="container">
                 <div class="row">
                   <div class="col-12">
                     <input type="checkbox" id="show-menu-main" role="button">
                     <label for="show-menu-main" class="show-menu-main">Menu</label>

                     <?php if ( has_nav_menu( 'menu-main' ) ) {
                        wp_nav_menu(array( 'theme_location' => 'menu-main', 'container' => 'ul', 'menu_class' => 'nav' ));
                     } if ( has_nav_menu( 'mega-main' ) ) {
                        wp_nav_menu(array( 'theme_location' => 'mega-main', 'container' => 'ul', 'menu_class' => 'nav mega-menu' ));
                     } ?>
                   </div>
                 </div>
               </div>
               </nav>
             </div>

           </div>
         </div>
         </header>

         <div id="container">