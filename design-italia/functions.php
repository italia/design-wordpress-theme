<?php
add_action('after_setup_theme', 'wppa_setup');

function wppa_setup()	{
	load_theme_textdomain('wppa', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
  
  /* ADD LOGO TO CMS */
  add_theme_support( 'custom-logo', array(
  	'height'      => 80,
  	'width'       => 80,
  	'flex-height' => true,
  ) );
  function wppa_the_custom_logo( $blog_id = 0 ) {
      echo get_custom_logo( $blog_id );
  }
  
  /* ADD HEADER IMAGE TO CMS */
  $args = array(
      'flex-width'    => true,
      'width'         => 200,
      'flex-height'   => true,
      'height'        => 30,
      'default-image' => get_template_directory_uri() . '/img/header-image.png',
  );
  add_theme_support( 'custom-header', $args );

	global $content_width;
	if (!isset($content_width)) $content_width = 640;
	register_nav_menus(array(
		'menu-main' => __('Main Menu', 'wppa'),
		'menu-language'  => __( 'Lingua Menu', 'wppa' ),
		'menu-social'  => __( 'Social Menu', 'wppa' ),
		'menu-footer'  => __( 'Footer Menu', 'wppa' )
	));

$args = array(
	'default-color' => 'ffffff',
  'default-image' => get_template_directory_uri() . '/img/blank.png',
);
add_theme_support( 'custom-background', $args );
}

add_action('wp_enqueue_scripts', 'wppa_load_scripts');
function wppa_load_scripts() {
  wp_enqueue_script( 'bootstrap-min', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), true );
  wp_enqueue_script( 'bootstrap-italia-bundle-min', get_template_directory_uri() . '/bootstrap-italia/js/bootstrap-italia.bundle.min.js', array(), true );
  wp_enqueue_script( 'bootstrap-italia-bundle-min-map', get_template_directory_uri() . '/bootstrap-italia/js/bootstrap-italia.bundle.min.js.map', array(), true );
  wp_enqueue_script( 'bootstrap-italia-min', get_template_directory_uri() . '/bootstrap-italia/js/bootstrap-italia.min.js', array(), true );
  wp_enqueue_script( 'bootstrap-italia-min-map', get_template_directory_uri() . '/bootstrap-italia/js/bootstrap-italia.min.js.map', array(), true );
  // wp_enqueue_script( 'bootstrap-italia-min', get_template_directory_uri() . '/bootstrap-italia/js/bootstrap-italia.min.js', array(), true );
	// wp_enqueue_script('jquery');
}

/* AGGIUNGI ASSETS DI BOOTSTRAP ITALIA */
add_action( 'wp_enqueue_scripts', 'enqueue_wppa_styles' );
function enqueue_wppa_styles() {
    wp_enqueue_style( 'bootstrap-italia-min', get_template_directory_uri() . "/bootstrap-italia/css/bootstrap-italia.min.css");
    wp_enqueue_style( 'bootstrap-italia-map', get_template_directory_uri() . "/bootstrap-italia/css/bootstrap-italia.min.css.map");
    wp_enqueue_style( 'italia-icon-font', get_template_directory_uri() . "/bootstrap-italia/css/italia-icon-font.css");
    wp_enqueue_style( 'general-style', get_template_directory_uri() . "/style.css");
};

add_action('comment_form_before', 'wppa_enqueue_comment_reply_script');

function wppa_enqueue_comment_reply_script() {
if (get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
	}
}

add_filter('the_title', 'wppa_title');

function wppa_title($title) {
	if ($title == '') {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter('wp_title', 'wppa_filter_wp_title');

function wppa_filter_wp_title($title) {
	return $title . esc_attr(get_bloginfo('name'));
}


if (function_exists('register_sidebar')) {
// function wppa_widgets_init() {
	register_sidebar(array(
		'name' => __('Home Widget Area', 'wppa') ,
		'id' => 'home-widget-area',
		'description'   => __( 'Widget area che compare in homepage.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="col-lg widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => __('Sidebar Widget Area', 'wppa') ,
		'id' => 'primary-widget-area',
		'description'   => __( 'Widget area che compare nella sidebar.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

  register_sidebar(array(
  	'name' => __('Page Widget Area', 'wppa') ,
  	'id' => 'page-widget-area',
  	'description'   => __( 'Widget area che compare nelle pagine.', 'wppa' ),
  	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  	'after_widget' => "</div>",
  	'before_title' => '<h3 class="widget-title">',
  	'after_title' => '</h3>',
  ));

	register_sidebar( array(
		'name' => __('Footer Widget Area', 'wppa') ,
		'id' => 'footer-widget-area',
		'description'   => __( 'Widget area che compare nel footer.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="col-lg widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h5 class="widget-title"><strong>',
		'after_title' => '</strong></h5>',
	));
}
// add_action('widgets_init', 'wppa_widgets_init');


function wppa_custom_pings($comment) {
	$GLOBALS['comment'] = $comment;
?>
<li <?php
	comment_class(); ?> id="li-comment-<?php
	comment_ID(); ?>"><?php
	echo comment_author_link(); ?></li>
<?php
	} add_filter('get_comments_number', 'wppa_comments_number');

function wppa_comments_number($count) {
	if (!is_admin()) 	{
		global $id;
		$comments_by_type = & separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
		} else {
		return $count;
		}
	}
	
	
/* ESTENSIONE DEL WIDGET POST */
Class wppa_recent_posts_widget extends WP_Widget_Recent_Posts {
  function widget($args, $instance) {
    if ( ! isset( $args['widget_id'] ) ) {
    $args['widget_id'] = $this->id;
  }
  $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : _( 'Ultimi Aritcoli' );
  /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
  $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
  $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
  if ( ! $number )
      $number = 5;
  $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
  $r = new WP_Query( apply_filters( 'widget_posts_args', array(
      'posts_per_page'      => $number,
      'no_found_rows'       => true,
      'post_status'         => 'publish',
      'ignore_sticky_posts' => true
  ) ) );
  if ($r->have_posts()) :
  ?>
  <?php echo $args['before_widget']; ?>
  <?php if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
  } ?>
  
  <div class="row widget_last_post">
  <?php while ( $r->have_posts() ) : $r->the_post(); ?>
    <div class="col-3 widget_last_post_wrap">
      <div class="widget_last_post_inner">
        <!--<a href="<?php the_permalink(); ?>">-->
        <!--  <?php the_post_thumbnail('thumbnail', array('class' => 'rounded float-right')); ?>-->
        <!--</a>-->
        <h5><strong>&#9679; <?php the_category( ', ' ); ?></strong></h5>
      	<h5><?php the_time( get_option( 'date_format' ) ); ?></h5>
        <h4><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
      </div>
    </div>
  <?php endwhile; ?>
  </div>


  <?php echo $args['after_widget']; ?>
  <?php
  // Reset the global $the_post as this query will have stomped on it
  wp_reset_postdata();
  endif;
  }
}
function wppa_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('wppa_recent_posts_widget');
}
add_action('widgets_init', 'wppa_recent_widget_registration');

add_action('init','wppa_add_editor_styles');
function wppa_add_editor_styles() {
 add_editor_style('bootstrap-italia/css/bootstrap-italia.min.css');
}


/* FUNZIONI PERSONALI */
add_action('customize_register','wppa_customizer_options');

function wppa_customizer_options( $wp_customize ) {
  
  $wp_customize->add_setting( 'wppa_head_color', array(
    'default' => '#0066cc',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wppa_custom_accent_color', array(
    'label'      => __( 'Colore della testata', 'wppa' ),
    'section'    => 'colors',
    'settings'   => 'wppa_head_color'
  ) ) );
  
  
  $wp_customize->add_setting( 'wppa_link_color' , array(
    'default'     => "#0066cc",
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
    'label'       => __( 'Colore dei link', 'wppa' ),
    'section'     => 'colors',
    'settings'     => 'wppa_link_color'
  ) ) );

  
  $wp_customize->add_setting( 'wppa_footer_color' , array(
    'default'     => "#00264d",
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wppa_custom_footer_color', array(
    'label'       => __( 'Colore del footer', 'wppa' ),
    'section'     => 'colors',
    'settings'     => 'wppa_footer_color'
  ) ) );


  $wp_customize->add_setting( 'wppa_footer_link' , array(
    'default'     => "#65dcdf",
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wppa_custom_footer_link', array(
    'label'       => __( 'Colore dei link nel footer', 'wppa' ),
    'section'     => 'colors',
    'settings'     => 'wppa_footer_link'
  ) ) );

}

add_action( 'wp_head', 'wppa_customize_css' );
function wppa_customize_css() { ?>
  <style type="text/css">
    .branding, .menu-main { background-color: <?php echo get_theme_mod( 'wppa_head_color', "#0066cc" ); ?>; }
    a, a:hover { color: <?php echo get_theme_mod('wppa_link_color', "#0066cc"); ?>; }
    button, input[type="submit"] { background-color: <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; }
    html, #footer { background-color: <?php echo get_theme_mod( 'wppa_footer_color', '#00264d' ); ?>; }
    #footer a { color: <?php echo get_theme_mod('wppa_footer_link', "#65dcdf"); ?>; }
  </style>
  <?php
}

/* AGGIUNGI BREADCRUMP NEI POST */
function wppa_breadcrumb() {
	echo '<ul class="breadcrumb">';
  echo '<li class="breadcrumb-item"><a href="'.home_url().'" rel="nofollow">Home</a></li>';
  
  if (is_category() || is_single()) {
    echo '<li class="breadcrumb-item">';
    the_category('<li class="breadcrumb-item">');
      if (is_single()) {
        echo '<li class="breadcrumb-item">';
        the_title();
	    echo '</li>';
      }
    echo '</li>';
    
  } elseif (is_page()) {
    echo '<li class="breadcrumb-item">';
    echo the_title();
    echo '</li>';
    
  } elseif (is_search()) {
    echo '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Cerca risultati per... ';
    echo '"<em>';
    echo the_search_query();
    echo '</em>"';
  }
  echo '</ul>';
}


/*
  LIBS @/lib
*/ 

/* UPDATER THEME: https://github.com/YahnisElsts/plugin-update-checker/ */
require 'lib/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://raw.githubusercontent.com/italia/design-wordpress-theme/master/design-italia.json',
  __FILE__, //Full path to the main plugin file or functions.php.
  'unique-plugin-or-theme-slug'
);

/* SUGGEST PLUG-IN */
require_once dirname( __FILE__ ) . '/lib/tgm-plugin-activation/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'wppa_register_required_plugins' );
function wppa_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'SiteOrigin Widgets Bundle',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		),
	);
	$config = array(
		'id'           => 'wppa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',   // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',         // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}

function wppa_italia_buttons_1($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wppa_italia_buttons_1');

/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
    $style_formats = array(  
        array(  
          'title' => 'Bottone principale',  
          'block' => 'a',
          'classes' => 'btn btn-primary',
          'attributes' => array(
            'href' => '#',
          ),
          'wrapper' => true,
        ),  
        array(  
          'title' => 'Bottone secondario',  
          'block' => 'a',
          'classes' => 'btn btn-secondary',
          'attributes' => array(
            'href' => '#',
          ),
          'wrapper' => true,
        ),
        array(  
          'title' => 'Bottone verde',  
          'block' => 'a',
          'classes' => 'btn btn-success',
          'attributes' => array(
            'href' => '#',
          ),
          'wrapper' => true,
        ),
        array(  
          'title' => 'Bottone rosso',  
          'block' => 'a',
          'classes' => 'btn btn-danger',
          'attributes' => array(
            'href' => '#',
          ),
          'wrapper' => true,
        ),
        array(  
          'title' => 'Bottone giallo',  
          'block' => 'a',
          'classes' => 'btn btn-warning',
          'attributes' => array(
            'href' => '#',
          ),
          'wrapper' => true,
        ),
        array(
          'title' => 'Bottone piatto',  
          'block' => 'a',
          'classes' => 'btn btn-link',
          'attributes' => array(
            'href' => '#',
          ),
          'wrapper' => true,
        ),
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 


/* 
  
  Custom widget 

*/

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );
function new_excerpt_more( $more ) {
    return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');


class Category_Posts extends WP_Widget {

    public function __construct() 
    {
        parent::__construct(
            'widget_category_posts', 
            _x( 'DesignItalia - Articoli per categoria', 'DesignItalia - Articoli per categoria' ), 
            [ 'description' => __( 'Widget che visualizza gli articoli di una categoria selezionata in stile Masonry.' ) ] 
        );
        $this->alt_option_name = 'widget_category_posts';

        add_action( 'save_post', [$this, 'flush_widget_cache'] );
        add_action( 'deleted_post', [$this, 'flush_widget_cache'] );
        add_action( 'switch_theme', [$this, 'flush_widget_cache'] );
    }

    public function widget( $args, $instance ) 
    {
        $cache = [];
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'widget_cat_posts', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = [];
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();

        $title          = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Category Posts' );
        /** This filter is documented in wp-includes/default-widgets.php */
        $title          = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number         = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $cat_id         = $instance['cat_id'];
        $random         = $instance['rand'] ? true : false; 
        $excerpt        = $instance['excerpt'] ? true : false; 
        $thumbnail      = $instance['thumbnail'] ? true : false; 

        /**
         * Filter the arguments for the Category Posts widget.
         * @since 1.0.0
         * @see WP_Query::get_posts()
         * @param array $args An array of arguments used to retrieve the category posts.
         */
        if( true === $random ) {
            $query_args = [
                'posts_per_page'    => $number,
                'cat'               => $cat_id,
                'orderby'           => 'rand'
            ];
        }else{
            $query_args = [
                'posts_per_page'    => $number,
                'cat'               => $cat_id,
            ];
        }
        $q = new WP_Query( apply_filters( 'category_posts_args', $query_args ) );

        if( $q->have_posts() ) {

          echo '<div class="widget_category_mansory">';
            echo $args['before_widget'];
            if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }               
            
            echo '<div class="card-columns">';

            while( $q->have_posts() ) {
                $q->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> > 
                    <?php 
                    if ( has_post_thumbnail() && true === $thumbnail ) { ?>

                    <div class="card-img-top">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail( 'large' ); ?>
                      </a>
                    </div><!--/.post-thumbnail-->
                    <?php   
                      } 
                    ?>
                  <div class="card-body">

                    <header class="entry-header">
                        <?php the_title( '<h4 class="card-title">', '</h4>' ); ?>
                    </header><!-- .entry-header -->

                    <?php if( true === $excerpt ) { ?>    

                        <div class="card-text">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    <?php } ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-primary">Leggi tutto</a>
                  </div>

                </article><!-- #post-## -->

                <?php
            }

            echo '</div>';
          echo '</div>';
            
            wp_reset_postdata();
        }
            echo $args['after_widget']; 

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'widget_cat_posts', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    public function update( $new_instance, $old_instance ) 
    {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags( $new_instance['title'] );
        $instance['number']         = (int) $new_instance['number'];
        $instance['cat_id']         = (int) $new_instance['cat_id'];
        $instance['rand']           = $new_instance['rand'];
        $instance['excerpt']        = $new_instance['excerpt'];
        $instance['thumbnail']      = $new_instance['thumbnail'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_category_posts']) )
            delete_option('widget_category_posts');

        return $instance;
    }

    public function flush_widget_cache() 
    {
        wp_cache_delete('widget_cat_posts', 'widget');
    }

    public function form( $instance ) 
    {

        $title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $cat_id     = isset( $instance['cat_id'] ) ? absint( $instance['cat_id'] ) : 1;
        $random     = isset( $instance['rand'] ) ? $instance['rand'] : false; 
        $excerpt    = isset( $instance['excerpt'] ) ? $instance['excerpt'] : false; 
        $thumbnail  = isset( $instance['thumbnail'] ) ? $instance['thumbnail'] : false; 
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Numero di articoli da visualizzare:' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo $number; ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e( 'Seleziona la categoria:' )?></label>
            <select id="<?php echo $this->get_field_id('cat_id'); ?>" name="<?php echo $this->get_field_name('cat_id'); ?>">
                <?php 
                $this->categories = get_categories();
                foreach ( $this->categories as $cat ) {
                    $selected = ( $cat->term_id == esc_attr( $cat_id ) ) ? ' selected = "selected" ' : '';
                    $option = '<option '.$selected .'value="' . $cat->term_id;
                    $option = $option .'">';
                    $option = $option .$cat->name;
                    $option = $option .'</option>';
                    echo $option;
                }
                ?>
            </select>
        </p>

        <p>
            <?php $checked = ( $random ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'rand' ); ?>" name="<?php echo $this->get_field_name( 'rand' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('rand'); ?>"><?php _e( 'Visualizza articoli casualmente' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $excerpt ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e( 'Visualizza estratto. Se deselezionato, visualizza solo il titolo dell\'articolo' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $thumbnail ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e( 'Visualizza le thumbnails degli articoli' ); ?></label>
        </p>

    <?php
    }

}

add_action( 'widgets_init', function () 
{
    register_widget( 'Category_Posts' );
});