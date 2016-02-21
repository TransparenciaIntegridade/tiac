<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* Manage content restriction shortcodes */
class WPPCP_Private_Posts_Pages{
    
    public $current_user;
    public $private_content_settings;
    
    /* intialize the settings and shortcodes */
    public function __construct(){
        global $wppcp;

        $this->current_user = get_current_user_id();            
      
        add_action( 'add_meta_boxes', array($this,'add_post_restriction_box' ));

        add_action( 'save_post', array($this,'save_post_restrictions' ));

        add_action('template_redirect', array($this, 'validate_restrictions'), 1); 
        
    }
    
    public function add_post_restriction_box(){
        $post_types = get_post_types( '', 'names' ); 
        $skipped_types = array('attachment','revision','nav_menu_item');

        foreach ( $post_types as $post_type ) {
            if(!in_array($post_type, $skipped_types)){
                add_meta_box(
                    'wppcp-post-restrictions',
                    __( 'WP Private Content Plus - Restriction Settings', 'wppcp' ),
                    array($this,'add_post_restrictions'),
                    $post_type

                );
            }
        }
    }

    public function add_post_restrictions($post){
        global $wppcp,$post_page_restriction_params;

        $post_page_restriction_params['post'] = $post;

        ob_start();
        $wppcp->template_loader->get_template_part('post-page-restriction-meta');    
        $display = ob_get_clean();  
        echo $display;
        
        

    }

    public function save_post_restrictions($post_id){

        $skipped_types = array('attachment','revision','nav_menu_item');

        if ( ! isset( $_POST['wppcp_restriction_settings_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['wppcp_restriction_settings_nonce'], 'wppcp_restriction_settings' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( isset( $_POST['post_type'] ) && !in_array($_POST['post_type'], $skipped_types) ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        $visibility = isset( $_POST['wppcp_post_page_visibility'] ) ? $_POST['wppcp_post_page_visibility'] : 'alll';
        $visible_roles = isset( $_POST['wppcp_post_page_roles'] ) ? $_POST['wppcp_post_page_roles'] : array();

        // Update the meta field in the database.
        update_post_meta( $post_id, '_wppcp_post_page_visibility', $visibility );
        update_post_meta( $post_id, '_wppcp_post_page_roles', $visible_roles );
    }

    public function validate_restrictions(){
        global $wppcp,$wp_query;

        $private_content_settings  = get_option('wppcp_options');


        if(!isset($private_content_settings['general']['private_content_module_status'])){
            return;        
        }

        $this->current_user = wp_get_current_user();

        if(current_user_can('manage_options')){
            return;
        }

        if (! isset($wp_query->post->ID) ) {
            return;
        }

        if(is_page() || is_single()){
            $post_id = $wp_query->post->ID;

            if($this->protection_status($post_id)){
                return;
            }else{
                $url = $private_content_settings['general']['post_page_redirect_url'];
                if(trim($url) == ''){
                    $url = get_home_url();
                }
                wp_redirect($url);exit;
            }

        }

        // if(is_tax() is_tag() is_category() is_author()
       
        if(is_archive() || is_feed() || is_search() ){
            
            if(isset($wp_query->posts) && is_array($wp_query->posts)){
                foreach ($wp_query->posts as $key => $post_obj) {
                    if(!$this->protection_status($post_obj->ID)){
                        $wp_query->posts[$key]->post_content = apply_filters('wppcp_archive_page_restrict_message', __('You don\'t have permission to view the content','wppcp'), array());
                    }
                }
            }
        }

        return;
    }

    public function protection_status($post_id){
        global $wppcp;

        $visibility = get_post_meta( $post_id, '_wppcp_post_page_visibility', true );
        $visible_roles = get_post_meta( $post_id, '_wppcp_post_page_roles', true );
        if(!is_array($visible_roles)){
            $visible_roles = array();
        }

        switch ($visibility) {
            case 'all':
                return TRUE;
                break;
            
            case 'guest':
                if(is_user_logged_in()){
                    return FALSE;
                }else{
                    return TRUE;
                }
                break;

            case 'member':
                if(is_user_logged_in()){
                    return TRUE;
                }else{
                    return FALSE;
                }
                break;

            case 'role':
                if(is_user_logged_in()){
                    if(count($visible_roles) == 0){
                        return FALSE;
                    }else{
                        $user_roles = $wppcp->roles_capability->get_user_roles_by_id($this->current_user);
                        foreach ($visible_roles as  $visible_role ) {
                            if(in_array($visible_role, $user_roles)){
                                return TRUE;
                            }
                        }
                        return FALSE;
                    }
                }else{
                    return FALSE;
                }
                
                break;
        }

        return TRUE;
    }
}