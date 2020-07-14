<?php

class B2S_Hook_Filter{
    
    function get_wp_user_post_author_display_name($wp_post_author_id = 0) {
        $user_data = get_userdata($wp_post_author_id);
        if($user_data != false && !empty($user_data->display_name)) {
            $wp_display_name = apply_filters('b2s_filter_wp_user_post_author_display_name', $user_data->display_name, $wp_post_author_id);
            return $wp_display_name;
        }
        return '';
    }
    
    function get_wp_post_hashtag($post_id = 0, $post_type = '') {
        $keywords = wp_get_post_tags((int) $post_id);
        if (($keywords == false || empty($keywords))) {
            if(taxonomy_exists($post_type . '_tag')) {
                $keywords = wp_get_post_terms((int) $post_id, $post_type . '_tag');
            } elseif(taxonomy_exists($post_type . '-tag')) {
                $keywords = wp_get_post_terms((int) $post_id, $post_type . '-tag');
            }
        }
        $wp_hashtags = apply_filters('b2s_filter_wp_post_hashtag', $keywords, $post_id);
        return $wp_hashtags;
    }
    
}
