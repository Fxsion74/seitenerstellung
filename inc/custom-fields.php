<?php
// Meta Boxes für Portfolio
function webstudio_portfolio_meta_boxes() {
    add_meta_box(
        'portfolio_details',
        'Portfolio Details',
        'webstudio_portfolio_meta_callback',
        'portfolio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'webstudio_portfolio_meta_boxes');

function webstudio_portfolio_meta_callback($post) {
    wp_nonce_field('webstudio_portfolio_meta', 'webstudio_portfolio_nonce');
    
    $category = get_post_meta($post->ID, '_portfolio_category', true);
    $client = get_post_meta($post->ID, '_portfolio_client', true);
    $url = get_post_meta($post->ID, '_portfolio_url', true);
    $tech = get_post_meta($post->ID, '_portfolio_tech', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="portfolio_category">Kategorie</label></th>
            <td><input type="text" id="portfolio_category" name="portfolio_category" value="<?php echo esc_attr($category); ?>" style="width:100%;" /></td>
        </tr>
        <tr>
            <th><label for="portfolio_client">Kunde</label></th>
            <td><input type="text" id="portfolio_client" name="portfolio_client" value="<?php echo esc_attr($client); ?>" style="width:100%;" /></td>
        </tr>
        <tr>
            <th><label for="portfolio_url">Website URL</label></th>
            <td><input type="url" id="portfolio_url" name="portfolio_url" value="<?php echo esc_attr($url); ?>" style="width:100%;" /></td>
        </tr>
        <tr>
            <th><label for="portfolio_tech">Technologien</label></th>
            <td><textarea id="portfolio_tech" name="portfolio_tech" rows="3" style="width:100%;"><?php echo esc_textarea($tech); ?></textarea></td>
        </tr>
    </table>
    <?php
}

// Save Meta Data
function webstudio_save_portfolio_meta($post_id) {
    if (!isset($_POST['webstudio_portfolio_nonce']) || !wp_verify_nonce($_POST['webstudio_portfolio_nonce'], 'webstudio_portfolio_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['portfolio_category'])) {
        update_post_meta($post_id, '_portfolio_category', sanitize_text_field($_POST['portfolio_category']));
    }
    
    if (isset($_POST['portfolio_client'])) {
        update_post_meta($post_id, '_portfolio_client', sanitize_text_field($_POST['portfolio_client']));
    }
    
    if (isset($_POST['portfolio_url'])) {
        update_post_meta($post_id, '_portfolio_url', esc_url_raw($_POST['portfolio_url']));
    }
    
    if (isset($_POST['portfolio_tech'])) {
        update_post_meta($post_id, '_portfolio_tech', sanitize_textarea_field($_POST['portfolio_tech']));
    }
}
add_action('save_post', 'webstudio_save_portfolio_meta');

// Services Meta Boxes
function webstudio_services_meta_boxes() {
    add_meta_box(
        'service_details',
        'Service Details',
        'webstudio_service_meta_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'webstudio_services_meta_boxes');

function webstudio_service_meta_callback($post) {
    wp_nonce_field('webstudio_service_meta', 'webstudio_service_nonce');
    
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $color = get_post_meta($post->ID, '_service_color', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_icon">Icon (Emoji oder HTML)</label></th>
            <td><input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>" placeholder="⚡" /></td>
        </tr>
        <tr>
            <th><label for="service_color">Akzentfarbe</label></th>
            <td><input type="color" id="service_color" name="service_color" value="<?php echo esc_attr($color ?: '#6366f1'); ?>" /></td>
        </tr>
    </table>
    <?php
}

function webstudio_save_service_meta($post_id) {
    if (!isset($_POST['webstudio_service_nonce']) || !wp_verify_nonce($_POST['webstudio_service_nonce'], 'webstudio_service_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    
    if (isset($_POST['service_color'])) {
        update_post_meta($post_id, '_service_color', sanitize_hex_color($_POST['service_color']));
    }
}
add_action('save_post', 'webstudio_save_service_meta');