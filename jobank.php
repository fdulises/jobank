
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

/*
* Habilitar los custom types
*/
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


/*
* Logica del plugin
*/
function jobank_main($content){

    $postid = get_the_ID();
    $posttype = get_post_type( $postid );
    $jobankpost_term = 'jobankpost';
    $jobankrequest_term = 'jobankrequest';
    $jobankcv_term = 'jobankcv';
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
    if ( $posttype == $jobankpost_term ) {

        $propuesta = get_post($postid);

        $request_list = get_children([
            'posts_per_page' => 20,
            'order'          => 'ASC',
            'post_parent'    => $postid,
            'post_type'      => $jobankrequest_term,
        ]);

        $content = json_encode([
            'post' => $propuesta,
            'children' => $request_list
        ]);

    }

    // Logica para publicar propuestas de trabajo
    if (is_page(get_id_by_slug('jobankpost-create'))) {

        if( isset($_GET['save']) ){

            if( isset(
                $_POST['field-cargo'],
                $_POST['field-ciudad'],
                $_POST['field-contrato'],
                $_POST['field-turno'],
                $_POST['field-experiencia'],
                $_POST['field-description'],
                $_POST['field-empresa_name'],
                $_POST['field-empresa_web']
            ) ){
    
                $new_page_id = wp_insert_post([
                    'post_type'     => 'jobankpost',
                    'post_title'    => 'Test propuesta laboral',
                    'post_content'  => json_encode([
                        'field-cargo' => $_POST['field-cargo'],
                        'field-ciudad' => $_POST['field-ciudad'],
                        'field-contrato' => $_POST['field-contrato'],
                        'field-turno' => $_POST['field-turno'],
                        'field-experiencia' => $_POST['field-experiencia'],
                        'field_description' => $_POST['field_description'],
                        'field-empresa_name' => $_POST['field-empresa_name'],
                        'field-empresa_web' => $_POST['field-empresa_web'],
                    ]),
                    'post_status'   => 'publish',
                    'post_author'   => $userid,
                    //'post_name'     => 'test-page-title3',
                ]);
    
                return "Propuesta #" . $new_page_id . "publicada con éxito";
                
            }


        }else{
            ob_start();
            require(__DIR__ . '/pages/jobank.post.create.php');
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        }
    }

    // Sección listado de propuestas de trabajo
    if( is_page( get_id_by_slug($jobankpost_term) ) ){
        $jobankpost = get_posts([
            'numberposts' => 20,
            'post_type'   => 'jobankpost'
        ]);
        $content = json_encode($jobankpost);
        return $content;
    }

    // Logica para ver y publicar CV
    if (is_page(get_id_by_slug($jobankcv_term))) {


        // Logica para guardar CV
        if ( isset(
                $_POST['field-name'],
                $_POST['field-surname'],
                $_POST['field-lastname'],
                $_POST['field-mail']
            ) ) {
            $post_data = [
                'post_type'     => 'jobankcv',
                'post_title'    => 'CV #' . $userid,
                'post_content'  => json_encode([
                    'field-name' => $_POST['field-name'],
                    'field-surname' => $_POST['field-surname'],
                    'field-lastname' => $_POST['field-lastname'],
                    'field-mail' => $_POST['field-mail'],
                ]),
                'post_status'   => 'publish',
                'post_author'   => $userid,
                'post_name'     => 'cvid_' . $userid,
            ];

            if ($actual_cv) $post_data['ID'] = $actual_cv['ID'];

            if ($actual_cv) $new_page_id = wp_update_post($post_data);
            else $new_page_id = wp_insert_post($post_data);
        }

        // Logica para visualizar CV
        $actual_cv = get_posts([
            'post_type'   => $jobankcv_term,
            'numberposts' => 1,
            'author' => $userid,
        ]);
        $cv = [];
        if( $actual_cv ){
            $actual_cv = (array) $actual_cv[0];
            $cv = json_decode($actual_cv['post_content'], true);
        }

        ob_start();
        require(__DIR__ . '/pages/jobank.cv.create.php');
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    return $content;
}
add_filter('the_content', 'jobank_main');


/*
* Obtener ID de post Mediante su SLUG
*/
function get_id_by_slug($page_slug){
    $page = get_page_by_path($page_slug);
    if ($page) return $page->ID;
    return null;
}
