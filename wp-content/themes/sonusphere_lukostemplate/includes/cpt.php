<?php

// Register Custom Post Type for YouTube Videos
function lukostempl_register_youtube_video_cpt() {
    $labels = array(
        'name' => 'YouTube Videos',
        'singular_name' => 'YouTube Video',
        'menu_name' => 'YouTube Videos',
        'name_admin_bar' => 'YouTube Video',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New YouTube Video',
        'new_item' => 'New YouTube Video',
        'edit_item' => 'Edit YouTube Video',
        'view_item' => 'View YouTube Video',
        'all_items' => 'All YouTube Videos',
        'search_items' => 'Search YouTube Videos',
        'not_found' => 'No YouTube Videos found.',
        'not_found_in_trash' => 'No YouTube Videos found in Trash.'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'youtube-videos'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    );
    register_post_type('youtube_video', $args);
}
add_action('init', 'lukostempl_register_youtube_video_cpt');

// Add meta box for YouTube Video ID and Thumbnail
add_action('add_meta_boxes', function() {
    add_meta_box('lukostempl_youtube_video_info', 'YouTube Video Info', 'lukostempl_youtube_video_info_callback', 'youtube_video', 'normal', 'high');
});

function lukostempl_youtube_video_info_callback($post) {
    $video_id = get_post_meta($post->ID, 'lukostempl_youtube_video_id', true);
    $thumbnail = get_post_meta($post->ID, 'lukostempl_youtube_thumbnail', true);
    if ($video_id) {
        echo '<p><strong>Video ID:</strong> ' . esc_html($video_id) . '</p>';
        echo '<iframe width="420" height="236" src="https://www.youtube.com/embed/' . esc_attr($video_id) . '" frameborder="0" allowfullscreen></iframe>';
    }
    if ($thumbnail) {
        echo '<p><img src="' . esc_url($thumbnail) . '" style="max-width:200px;" /></p>';
    }
}

// Shortcode to display YouTube videos
add_shortcode('lukostempl_youtube_videos', function($atts) {
    $atts = shortcode_atts([
        'count' => 6
    ], $atts);
    $query = new WP_Query([
        'post_type' => 'youtube_video',
        'posts_per_page' => intval($atts['count'])
    ]);
    ob_start();
    if ($query->have_posts()) {
        echo '<div class="lukostempl-youtube-videos">';
        while ($query->have_posts()) {
            $query->the_post();
            $video_id = get_post_meta(get_the_ID(), 'lukostempl_youtube_video_id', true);
            echo '<div class="lukostempl-youtube-video">';
            if ($video_id) {
                echo '<iframe width="320" height="180" src="https://www.youtube.com/embed/' . esc_attr($video_id) . '" frameborder="0" allowfullscreen></iframe>';
            }
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<div class="desc">' . get_the_content() . '</div>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No YouTube videos found.</p>';
    }
    return ob_get_clean();
});
