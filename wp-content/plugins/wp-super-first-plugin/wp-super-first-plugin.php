<?php
/**
 * Plugin Name: WP Super First Plugin
 * Plugin URI: localhost
 * Description: Pierwszy plugin WordPress.
 * Version: 1.0
 * Author: Agata Przybyła
 * Author URI: localhost
**/
function wp_super_first_plugin() {
    ?>
    <script>
        console.log('Test wtyczki!');
    </script>
    <?php
}
add_action('wp_footer', 'wp_super_first_plugin');
?>