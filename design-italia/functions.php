<?php
add_action('after_setup_theme', 'wppa_setup');

function wppa_setup()	{
	load_theme_textdomain('wppa', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
  
  
  /* ADD BIG 4:3 THUMBS */
  if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'large-thumb', 640, 480, true);
    add_image_size( 'mansory-thumb', 600, 350, true);
    add_image_size( 'single-alignfull-thumb', 1280, 350, true );
    add_filter('image_size_names_choose', 'my_image_sizes');
  }
  function my_image_sizes($sizes) {
      $addsizes = array(
          "large-thumb" => __( "Large image")
      );
      $newsizes = array_merge($sizes, $addsizes);
      return $newsizes;
  }

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
		'mega-main' => __('Mega Menu', 'wppa'),
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

/* AGGIUNGI ASSETS DI BOOTSTRAP ITALIA */
add_action( 'wp_enqueue_scripts', 'enqueue_wppa_styles' );
function enqueue_wppa_styles() {
    // wp_enqueue_style( 'icons8-icon-min', "//maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css");
    wp_enqueue_style( 'lineawesome-icon-min', get_template_directory_uri() . "/lib/bootstrap-italia/css/line-awesome.min.css");
    wp_enqueue_style( 'bootstrap-italia-min', get_template_directory_uri() . "/lib/bootstrap-italia/css/bootstrap-italia.min.css");
    wp_enqueue_style( 'bootstrap-italia-map', get_template_directory_uri() . "/lib/bootstrap-italia/css/bootstrap-italia.min.css.map");
    wp_enqueue_style( 'bootstrap-italia-icon-font', get_template_directory_uri() . "/lib/bootstrap-italia/css/italia-icon-font.css");
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
		'name' => __('Post Sidebar Widget Area', 'wppa') ,
		'id' => 'primary-widget-area',
		'description'   => __( 'Widget area che compare nella sidebar dei post.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

  register_sidebar(array(
  	'name' => __('Page Sidebar Widget Area', 'wppa') ,
  	'id' => 'page-widget-area',
  	'description'   => __( 'Widget area che compare nella sidebar delle pagine.', 'wppa' ),
  	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  	'after_widget' => "</div>",
  	'before_title' => '<h6 class="widget-title">',
  	'after_title' => '</h6>',
  ));

	register_sidebar( array(
		'name' => __('Footer Widget Area', 'wppa') ,
		'id' => 'footer-widget-area',
		'description'   => __( 'Widget area che compare nel footer.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="col-lg widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'name' => __('Footer Sub Widget Area', 'wppa') ,
		'id' => 'footer-sub-widget-area',
		'description'   => __( 'Widget area che compare sotto la footer widget area.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="col-lg widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'name' => __('Post Footer Widget Area', 'wppa') ,
		'id' => 'single-footer-widget-area',
		'description'   => __( 'Widget area che compare sotto il contenuto del singolo post.', 'wppa' ),
		'before_widget' => '<div id="%1$s" class="col-lg widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
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
		// $comments_by_type = & separate_comments(get_comments('status=approve&post_id=' . $id));
		$cc = get_comments('status=approve&post_id=' . $id);
    $comments_by_type = separate_comments($cc);
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
  $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : _( 'Ultimi Articoli' );
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
        <h5><strong><?php the_category( ', ' ); ?></strong></h5>
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


function add_opengraph_doctype($output) {
    return $output . '
    xmlns="https://www.w3.org/1999/xhtml"
    xmlns:og="https://ogp.me/ns#" 
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

add_action('wp_head', 'wppa_opengraph');
function wppa_opengraph() {

  if( is_single() || is_page() ) {

    $post_id = get_queried_object_id();

    $url = get_permalink($post_id);
    $title = get_the_title($post_id);
    $site_name = get_bloginfo('name');

    $description = wp_trim_words( get_post_field('post_content', $post_id), 25 );

    $image = get_the_post_thumbnail_url($post_id);
    if( !empty( get_post_meta($post_id, 'og_image', true) ) ) $image = get_post_meta($post_id, 'og_image', true);

    $locale = get_locale();

    echo '<meta property="og:locale" content="' . esc_attr($locale) . '" />';
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:title" content="' . esc_attr($title) . ' | ' . esc_attr($site_name) . '" />';
    echo '<meta property="og:description" content="' . esc_attr($description) . '" />';
    echo '<meta property="og:url" content="' . esc_url($url) . '" />';
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '" />';

    if($image) echo '<meta property="og:image" content="' . esc_url($image) . '" />';

    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image" />';
    // echo '<meta name="twitter:site" content="@account" />';
    // echo '<meta name="twitter:creator" content="@account" />';

  }

}


add_action( 'wp_head', 'wppa_customize_css' );
function wppa_customize_css() { ?>
  <style type="text/css">
    .it-header-center-wrapper, .it-header-navbar-wrapper, .it-header-wrapper { background-color: <?php echo get_theme_mod( 'wppa_head_color', "#0066cc" ); ?>; }
    a, a:hover, a.read-more, .menu-main .nav li ul a, .menu-main .nav li ul a:hover, .menu-main .nav li:hover ul a { color: <?php echo get_theme_mod('wppa_link_color', "#0066cc"); ?>; }
    button, input[type="submit"], .btn-primary { background-color: <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; }
    .btn-primary:hover, .btn-primary:not(:disabled):not(.disabled):active { background-color: <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; box-shadow: inset 0 0 0 2px rgba(0, 0, 0, 0.1); }
    .btn-outline-primary { color: <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; box-shadow: inset 0 0 0 1px <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; }
    .btn-outline-primary:hover, .btn-outline-primary:not(:disabled):not(.disabled):active { color: <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; box-shadow: inset 0 0 0 2px <?php echo get_theme_mod( 'wppa_link_color', "#0066cc" ); ?>; }
    html, #footer, .it-footer-main { background-color: <?php echo get_theme_mod( 'wppa_footer_color', '#004080' ); ?>; }
    #footer a { color: <?php echo get_theme_mod('wppa_footer_link', "#ffffff"); ?>; }
  </style>
  <?php }

add_action('wp_footer', 'footer_script');
function footer_script(){ ?>
  <script>
    var isMobile = false; //initiate as false
    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
    document.body.classList.add('touch')
    }
    
    const elements = document.querySelectorAll('.menu-item-has-children');
    elements.forEach(function(el, index){
      el.onclick = function() {
        el.classList.toggle('active');
      }
    })

  </script>
<?php }




function SearchFilter($query) {
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;}
add_filter('pre_get_posts','SearchFilter');





/* AGGIUNGI BREADCRUMP NEI POST E NELLE PAGINE */
function wppa_breadcrumb() {
  global $post;
  echo '<ul class="breadcrumb">';
  if (!is_home()) {
    echo '<li class="breadcrumb-item"><a href="';
    echo get_option('home');
    echo '">';
    echo 'Home';
    echo '</a></li>';
    if (is_category() || is_single()) {
      echo '<li class="breadcrumb-item">';
      the_category(' </li><li class="breadcrumb-item"> ');
      if (is_single()) {
        echo '</li><li class="breadcrumb-item">';
        the_title();
        echo '</li>';
      }
    } elseif (is_page()) {
      if($post->post_parent){
        $anc = get_post_ancestors( $post->ID );
        $title = get_the_title();
        foreach ( $anc as $ancestor ) {
          $output = '<li class="breadcrumb-item"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
        }
        echo $output;
        echo '<li class="breadcrumb-item">'.$title.'</li>';
      } else {
        echo '<li class="breadcrumb-item">'.get_the_title().'</li>';
      }
    }
  }
  /* elseif (is_tag()) {single_tag_title();}
  elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
  elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
  elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
  elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
  elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
  elseif (is_search()) {echo"<li>Search Results"; echo'</li>';} */
  echo '</ul>';
}


// Numbered Pagination
if ( !function_exists( 'wppa_pagination' ) ) {
	
	function wppa_pagination() {
		
		$prev_arrow = is_rtl() ? '<i class="it-chevron-right"></i>' : '<i class="it-chevron-left"></i>';
		$next_arrow = is_rtl() ? '<i class="it-chevron-left"></i>' : '<i class="it-chevron-right"></i>';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 2,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}


/* *** JUST FOR GUTENBERG ***  */

/* Enqueue WordPress theme styles within Gutenberg. */
function wppa_gutenberg_styles() {
	 wp_enqueue_style( 'wppa-gutenberg', get_template_directory_uri() . '/lib/block/block.css', false, '@@pkg.version', 'all' );
	 // wp_enqueue_style( 'wppa-gutenberg-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-italia@0.25.2/dist/css/bootstrap-italia.min.css', false, '@@pkg.version', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'wppa_gutenberg_styles' );

/* Register support for Gutenberg wide images in your theme */
function wppa_setup_theme() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'wppa_setup_theme' );

/* Custom styled buttons within Gutenberg. */
function wppa_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Blu', 'themeLangDomain' ),
				'slug' => 'blu',
				'color' => '#004d99',
			),
			array(
				'name'  => __( 'Grigio scuro', 'themeLangDomain' ),
				'slug' => 'grigioscuro',
				'color' => '#3d4955',
			),
			array(
				'name'  => __( 'Blu scuro', 'themeLangDomain' ),
				'slug' => 'bluscuro',
				'color' => '#17324d',
			),
			array(
				'name'  => __( 'Azzurro', 'themeLangDomain' ),
				'slug' => 'azzurro',
				'color' => '#0073e6',
			),
			array(
				'name'  => __( 'Grigio', 'themeLangDomain' ),
				'slug' => 'grigio',
				'color' => '#5c6f82',
			),
			array(
				'name'  => __( 'Grigio chiaro', 'themeLangDomain' ),
				'slug' => 'grigiochiaro',
				'color' => '#94a1ae',
			),
			array(
				'name'  => __( 'Verde', 'themeLangDomain' ),
				'slug' => 'verde',
				'color' => '#00cc85',
			),
			array(
				'name'  => __( 'Rosso', 'themeLangDomain' ),
				'slug' => 'rosso',
				'color' => '#f73e5a',
			),
			array(
				'name'  => __( 'Arancione', 'themeLangDomain' ),
				'slug' => 'arancione',
				'color' => '#ff9900',
			),
			array(
				'name'  => __( 'Argento', 'themeLangDomain' ),
				'slug' => 'argento',
				'color' => '#eef0f6',
			),
			array(
				'name'  => __( 'Bianco', 'themeLangDomain' ),
				'slug' => 'bianco',
				'color' => '#ffffff',
			)
		)
	);
}
add_action( 'after_setup_theme', 'wppa_setup_theme_supported_features' );

add_theme_support( 'editor-font-sizes', array(
    array(
      'name' => __( 'Piccolo', 'themeLangDomain' ),
      'size' => 14,
      'slug' => 'small'
    ),
    array(
      'name' => __( 'Normale', 'themeLangDomain' ),
      'size' => 18,
      'slug' => 'normal'
    ),
    array(
      'name' => __( 'Medio', 'themeLangDomain' ),
      'size' => 22,
      'slug' => 'medium'
    ),
    array(
      'name' => __( 'Grande', 'themeLangDomain' ),
      'size' => 32,
      'slug' => 'big'
    )
) );


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

/* 
  
  Custom widget - DesignItalia - Articoli a griglia

*/

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );
function new_excerpt_more( $more ) {
    return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_post_type_support ('page', 'excerpt');

class Category_Posts extends WP_Widget {

    public function __construct() 
    {
      parent::__construct(
        'widget_category_posts', 
        _x( 'DesignItalia - Articoli a griglia', 'DesignItalia - Articoli a griglia' ), 
        [ 'description' => __( 'Widget che visualizza gli articoli di una categoria selezionata in stile Masonry, a griglia.' ) ] 
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

        $title          = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Articoli per categoria' );
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
        $categories     = $instance['categories'] ? true : false; 
        $date           = $instance['date'] ? true : false; 
        $shadow         = $instance['shadow'] ? true : false; 

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

                    <?php if( true === $shadow ) { ?>
                      <article id="post-<?php the_ID(); ?>" <?php post_class('card card-bg'); ?> >
                    <?php } else { ?>
                      <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> >
                    <?php } ?>

                    <?php 
                    if ( has_post_thumbnail() && true === $thumbnail ) { ?>

                    <div class="card-img-top">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php 
            							the_post_thumbnail('mansory-thumb', array('class' => 'img-fluid')); 
                          // the_post_thumbnail( 'large' ); 
                        ?>
                      </a>
                    </div><!--/.post-thumbnail-->
                    <?php   
                      } 
                    ?>
                    <?php if(is_sticky()) { echo '<div class="flag-icon"></div>'; } ?>
                  <div class="card-body">
                    <div class="category-top">
                      <!-- <a class="category" href="#">Category</a> -->
                      <?php if( true === $categories ) { ?> 
                        <strong>
                          <?php the_category(', '); ?>
                        </strong>
                      <?php } ?>
                      <?php if( true === $date ) { ?> 
                        <span class="data">
                          <?php echo get_the_date( 'j M Y' ); ?>
                        </span>
                      <?php } ?>
                    </div>
                    <header class="entry-header">
                      <?php the_title( '<h5 class="card-title big-heading">', '</h5>' ); ?>
                    </header><!-- .entry-header -->

                    <?php if( true === $excerpt ) { ?>    

                        <div class="card-text">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    <?php } ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">Leggi di pi&ugrave; &nbsp;<span class="it-arrow-right"></span></a>
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
        $instance['date']           = $new_instance['date'];
        $instance['shadow']           = $new_instance['shadow'];
        $instance['categories']     = $new_instance['categories'];
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
        $date       = isset( $instance['date'] ) ? $instance['date'] : false; 
        $shadow     = isset( $instance['shadow'] ) ? $instance['shadow'] : false; 
        $categories = isset( $instance['categories'] ) ? $instance['categories'] : false; 
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
            <label for="<?php echo $this->get_field_id('rand'); ?>"><?php _e( 'Visualizza articoli casualmente. Se deselezionato, verranno visualizzati prima i più recenti.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $excerpt ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e( 'Visualizza estratto. Se deselezionato, visualizza solo il titolo dell\'articolo.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $thumbnail ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e( 'Visualizza le thumbnails degli articoli.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $categories ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'categories' ); ?>" name="<?php echo $this->get_field_name( 'categories' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Visualizza le categorie degli articoli.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $date ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('date'); ?>"><?php _e( 'Visualizza le date degli articoli.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $shadow ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'shadow' ); ?>" name="<?php echo $this->get_field_name( 'shadow' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('shadow'); ?>"><?php _e( 'Visualizza l\'ombra delle schede.' ); ?></label>
        </p>

    <?php
    }

}

add_action( 'widgets_init', function () 
{
    register_widget( 'Category_Posts' );
});


/* 
  
  Custom widget - DesignItalia - Articoli in orizzontale

*/

class Single_Post extends WP_Widget {

    public function __construct() 
    {
        parent::__construct(
            'widget_single_post', 
            _x( 'DesignItalia - Articoli in orizzontale', 'DesignItalia - Articoli in orizzontale' ), 
            [ 'description' => __( 'Widget che visualizza articoli di una categoria selezionata in orizzontale, uno sotto l\'altro.' ) ] 
        );
        $this->alt_option_name = 'widget_single_post';

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

        $title          = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Articolo singolo' );
        /** This filter is documented in wp-includes/default-widgets.php */
        $title          = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number         = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 1;
        if ( ! $number ) {
            $number = 1;
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
        $q = new WP_Query( apply_filters( 'single_post_args', $query_args ) );

        if( $q->have_posts() ) {

            echo $args['before_widget'];
            if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }               

            while( $q->have_posts() ) {
                $q->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?> > 

                  <div class="col-md novita-testo">
                    <header class="entry-header">
                      <h2>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>
                    </header><!-- .entry-header -->
                    <?php if( true === $excerpt ) { ?>    
                      <?php the_excerpt(); ?>
                    <?php } ?>
                    <!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-secondary btn-sm">Leggi tutto</a> -->
                    <p><?php foreach(get_the_category() as $category) {
                          echo '<a class="btn btn-outline-primary btn-xs" href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a> ';
                      } ?></p>
                  </div>
                  <?php 
                  if ( has_post_thumbnail() && true === $thumbnail ) { ?>

                  <div class="col-md offset-md-1 novita-foto">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <?php the_post_thumbnail( 'large-thumb' ); ?>
                    </a>
                  </div><!--/.post-thumbnail-->
                  <?php   
                    } 
                  ?>
                </article><!-- #post-## -->

                <?php
            }

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
        if ( isset($alloptions['widget_single_post']) )
            delete_option('widget_single_post');

        return $instance;
    }

    public function flush_widget_cache() 
    {
        wp_cache_delete('widget_cat_posts', 'widget');
    }

    public function form( $instance ) 
    {

        $title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 1;
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
            <label for="<?php echo $this->get_field_id('rand'); ?>"><?php _e( 'Visualizza articolo casualmente. Se deselezionato, verrà visualizzato il più recente.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $excerpt ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e( 'Visualizza estratto. Se deselezionato, visualizza solo il titolo dell\'articolo.' ); ?></label>
        </p>

        <p>
            <?php $checked = ( $thumbnail ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" value="true" <?php echo $checked; ?> />    
            <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e( 'Visualizza la thumbnail dell\'articolo.' ); ?></label>
        </p>

    <?php
    }

}

add_action( 'widgets_init', function () 
{
    register_widget( 'Single_Post' );
});