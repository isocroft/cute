<?php

 require_once(TEMPLATEPATH . '/functions/admin-menu.php'); 



// if (!current_user_can('administrator')) :
//   show_admin_bar(false);
// endif;

 

if(is_user_logged_in()):
  //print_r("YES"); 


if (!current_user_can('manage_options')) {
  show_admin_bar(false);
 //print_r("YES ADMIN"); 
 //die;
}

endif;

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





    function wpbootstrap_scripts_with_jquery()
    {
	// Register the script like this for a theme:
       wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/media/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
       wp_enqueue_script( 'bootstrap-js' );
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

add_theme_support( 'post-thumbnails' ); 
add_action( 'init' , 'wptp_add_categories_to_attachments' );
add_action( 'init' , 'wptp_add_tags_to_attachments' );















?>