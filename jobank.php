
<?php
/**
 * @package jobbank
 * @version 1.0
 */
/*
Plugin Name: jobbank
Description: jobbank plugin
Author: Lorem ipsum dolor
Version: 1.0
*/

// // Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'
// add_action( 'admin_menu', 'jobank_Add_My_Admin_Link' );

// // Add a new top level menu link to the ACP
// function jobank_Add_My_Admin_Link(){
//     add_menu_page(
//         'Bolsa de trabajo', // Title of the page
//         'Bolsa de trabajo', // Text to show on the menu link
//         'manage_options', // Capability requirement to see the link
//         'jobank/includes/main.php' // The 'slug' - file to display when clicking the link
//     );
// }


// Habilitar los custom types
function jobank_custom_type(){
    register_post_type('jobankpost', [
        'public'       => true,
        'show_in_rest' => false,
        'rest_base'    => 'jobankpost',
        'label'        => 'BT Ofertas'
    ]);

    register_post_type('jobankrequest', [
        'public'       => true,
        'show_in_rest' => false,
        'rest_base'    => 'jobankrequest',
        'label'        => 'BT Respuestas'
    ]);
}
add_action('init', 'jobank_custom_type');


// function jobank_add_new_field(){
//     register_rest_field('jobankpost', []);
// }
// add_action('rest_api_init', 'jobank_add_new_field');

// Renderizado de las paginas custom
function add_code_before_content($content){
    echo is_page(get_id_by_slug('jobankpost-create'));

    if (is_page(get_id_by_slug('jobankpost-create'))) {

        ob_start();
        require( __DIR__ . '/pages/jobankpost.create.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
        
    }else if( is_page( get_id_by_slug('jobankpost') ) ){
        $jobankpost = get_posts([
            'numberposts' => 9,
            'post_type'   => 'jobankpost'
        ]);

        $content = json_encode($jobankpost);

        return $content;
    } else  if (is_page(get_id_by_slug('jobankrequest'))) {
        $jobankpost = get_posts([
            'numberposts' => 9,
            'post_type'   => 'jobankrequest'
        ]);

        $content = json_encode($jobankpost);

        return $content;
    }

    return $content;
}
add_filter('the_content', 'add_code_before_content');

// function jobank_test(){
//     // if( isset($_GET['create_jobank']) ){
//     //     exit();
//     // }
//     // if ( is_page(get_id_by_slug('jobankpost')) ) {
//     //     $jobankpost = get_posts([
//     //         'numberposts' => 9,
//     //         'post_type'   => 'jobankpost'
//     //     ]);

//     //     $content = json_encode($jobankpost);
//     // }
// }
// do_action('init', 'jobank_test');


function get_id_by_slug($page_slug){
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
