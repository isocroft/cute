<?php 





function theme_settings_page()
{
    ?>
        <div class="wrap">
        <h1>Theme Panel</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
        </div>
    <?php
}


function setting_github(){ ?>
      <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" >
   <?php
    }   


function setting_twitter(){ ?>
        <input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" >
    <?php
}

  if(!function_exists('custom_settings_page_setup')){
    function theme_settings_page_setup(){
        add_settings_section('section', 'All Settings', null, 'theme-options');

        add_settings_field('twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section');
        add_settings_field('github', 'Github URL', 'setting_github', 'theme-options', 'section');

        register_setting('section', 'twitter');
        register_setting('section', 'github');
    }

    add_action('admin_init', 'theme_settings_page_setup');
    }

if(!function_exists('add_theme_menu_item')){
function add_theme_menu_item()
{
    add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-settings", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

}




?>