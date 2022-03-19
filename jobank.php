
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

// function jobank_add_new_field(){
//     register_rest_field('jobankpost', []);
// }
// add_action('rest_api_init', 'jobank_add_new_field');


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

    register_post_type('jobankcv', [
        'public'       => true,
        'show_in_rest' => false,
        'rest_base'    => 'jobankcv',
        'label'        => 'BT CV'
    ]);
    
}
add_action('init', 'jobank_custom_type');

function add_code_before_content($content){

    $postid = get_the_ID();
    $posttype = get_post_type( $postid );
    $jobankpost_term = 'jobankpost';
    $jobankrequest_term = 'jobankrequest';
    $userid = get_current_user_id();

    // Logica para publicar respuesta
    if ( $posttype == $jobankpost_term && isset($_GET['createrequest']) ) {

        $new_page_id = wp_insert_post([
            'post_type'     => 'jobankrequest',
            'post_title'    => 'Respuesta usuario '. $userid,
            'post_content'  => '--',
            'post_status'   => 'publish',
            'post_author'   => $userid,
            'post_parent'   => $postid,
        ]);

        return "Respuesta #" . $new_page_id . "publicada con éxito";

    }

    // Sección ver propuesta 
    if ($posttype == $jobankpost_term) {
        $jobankrequest_2 = get_children([
            'posts_per_page' => 20,
            'order'          => 'ASC',
            'post_parent'    => $postid,
            'post_type'      => $jobankrequest_term,
        ]);

        $content = json_encode($jobankrequest_2);
    }

    // Logica para publicar propuestas de trabajo
    if (is_page(get_id_by_slug('jobankpost-create'))) {

        if( isset($_GET['save']) ){

            $new_page_id = wp_insert_post([
                'post_type'     => 'jobankpost',
                'post_title'    => 'Test propuesta laboral',
                'post_content'  => 'Test Page Content',
                'post_status'   => 'publish',
                'post_author'   => $userid,
                //'post_name'     => 'test-page-title3',
            ]);

            return "Propuesta #" . $new_page_id . "publicada con éxito";

        }else{
            ob_start();
            require(__DIR__ . '/pages/jobank.post.create.php');
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        }
    }
    // Sección listado de propuestas de trabajo
    if( is_page( get_id_by_slug('jobankpost') ) ){
        $jobankpost = get_posts([
            'numberposts' => 20,
            'post_type'   => 'jobankpost'
        ]);
        $content = json_encode($jobankpost);
        return $content;
    }

    // Logica para publicar CV
    if (is_page(get_id_by_slug('jobankcv'))) {

        if (isset($_GET['save'])) {
            var_dump($_POST);

            var_dump(isset(
                $_POST['field-name'],
                $_POST['field-surname'],
                $_POST['field-lastname'],
                $_POST['field-mail']
            ));

            $has_cv = get_posts([
                'post_type'   => 'jobankcv',
                'numberposts' => 1,
                'author' => $userid,
            ]);

            var_dump($has_cv);

            // if( isset(
            //     $_POST['field-name'],
            //     $_POST['field-surname'],
            //     $_POST['field-lastname'],
            //     $_POST['field-mail']
            // ) ){
            //     $new_page_id = wp_insert_post([
            //         'post_type'     => 'jobankcv',
            //         'post_title'    => 'CV #'. $userid,
            //         'post_content'  => json_encode([
            //             'field-name' => $_POST['field-name'],
            //             'field-surname' => $_POST['field-surname'],
            //             'field-lastname' => $_POST['field-lastname'],
            //             'field-mail' => $_POST['field-mail'],
            //         ]),
            //         'post_status'   => 'publish',
            //         'post_author'   => $userid,
            //         'post_name'     => 'cvid_' . $userid,
            //     ]);
    
            //     return "Cv #" . $new_page_id . "publicado con éxito";
            // }


        } else {
            ob_start();
            require(__DIR__ . '/pages/jobank.cv.create.php');
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        }
    }

    return $content;
}
add_filter('the_content', 'add_code_before_content');


function get_id_by_slug($page_slug){
    $page = get_page_by_path($page_slug);
    if ($page) return $page->ID;
    return null;
}
