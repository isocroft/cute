<?php

 require_once(TEMPLATEPATH . '/functions/admin-menu.php'); 

if(is_user_logged_in()):

if (!current_user_can('manage_options')) {
  show_admin_bar(false);
 
}
endif;



if ( ! function_exists( '_wp_render_title_tag' ) ) {
  function theme_slug_render_title() {
    ?>


<title><?php wp_title( '|', true, 'right' ); ?></title>

 <?php }
  add_action( 'wp_head', 'theme_slug_render_title' );
} 
?>



<?php 





function xtreme_enqueue_comments_reply() {
  if( get_option( 'thread_comments' ) )  {
    wp_enqueue_script( 'comment-reply' );
  }
}



function pagination($pages = '', $range = 4)
{  
   $showitems = ($range * 2)+1;  

   global $paged;
   if(empty($paged)) $paged = 1;

   if($pages == '')
   {
       global $wp_query;
       $pages = $wp_query->max_num_pages;
       if(!$pages)
       {
           $pages = 1;
       }
   }   

   if(1 != $pages)
   {
       echo "
       <nav>
           <ul class=\"pagination\"> 
               <li><span>Page ".$paged." of ".$pages."</span></li>";
               if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li aria-label='Previous'><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
               if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";

               for ($i=1; $i <= $pages; $i++)
               {
                   if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                   {
                       echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
                   }
               }

               if ($paged < $pages && $showitems < $pages) echo "<li aria-label='Next'><a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";  
               if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
               echo "</ul></nav>";
           }
       }




       function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
            );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function wptp_add_categories_to_attachments() {
        register_taxonomy_for_object_type( 'category', 'attachment' );
    }

// apply tags to attachments
    function wptp_add_tags_to_attachments() {
        register_taxonomy_for_object_type( 'post_tag', 'attachment' );
    }


    if(! function_exists( 'cute_metatag_data' ) ){
      /**
       * Site Meta
       */
 
       function cute_metatag_data() {
           echo '<meta http-equiv="Content-Type" content="' . bloginfo('html_type') . '; charset=' . bloginfo('charset') . '" >';
           echo '<meta http-equiv="X-UA-Compatible" content="IE=edge" >';
           echo '<meta name="googlebot" content="follow, index" >';
           echo '<meta http-equiv="keywords" content="' . '-' .'" >';
           echo '<meta http-equiv="description" content="' . '-' . '" >';
           echo '<meta content="' . get_template_directory_uri() .  '/media/images/icons/windows-8-tile.png' . '" name="msapplication-TileImage" >';
           echo '<meta content="#f3f4f3" name="msapplication-TileColor" >';
           echo '<meta name="apple-mobile-web-app-capable" content="YES">';
           echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
       }
     
  }


    function wpbootstrap_scripts_with_jquery()
    {
	// Register the script like this for a theme:
       wp_register_script('cute-edetection', get_template_directory_uri() .'/media/custom/js/browsengine.js', array(), true);
      wp_register_script('cute-application', get_template_directory_uri() .'/media/custom/js/custom.js', array(), true);

       wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/media/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
       wp_enqueue_script( 'bootstrap-js' );
       wp_enqueue_script('cute-edetection');
       wp_enqueue_script('cute-application');
   }



   /** Add a category filter to images */
   function olab_add_image_category_filter() {
    $screen = get_current_screen();
    if ( 'upload' == $screen->id ) {
        $dropdown_options = array( 'show_option_all' => __( 'View all categories', 'olab' ), 'hide_empty' => false, 'hierarchical' => true, 'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options );
    }
}



function register_my_menu() {
  register_nav_menu('header-menu','Main Header Menu' );
}


add_action( 'init', 'register_my_menu' );
add_action( 'restrict_manage_posts', 'olab_add_image_category_filter' );

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

  if ( version_compare( $GLOBALS['wp_version'], '4.1', '>' ) ) {
      add_theme_support('title-tag'); /* for WordPress v4.1 */
  }

add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

add_theme_support( 'post-thumbnails' ); 
add_action( 'init' , 'wptp_add_categories_to_attachments' );
add_action( 'init' , 'wptp_add_tags_to_attachments' );

add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
  ) );

add_action( 'comment_form_before', 'xtreme_enqueue_comments_reply' );















?>