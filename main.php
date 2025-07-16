<?php
/**
 * Plugin Name: GF Visible Disabled Fields
 * Plugin URI:  https://www.wahpetonweb.com/wordpress-plugins/
 * Description: Keeps Gravity Forms fields visible when they would otherwise be hidden by conditional logic. Only affects fields with the CSS class 'gf-visible-disabled'.
 * Version:     1.0.0
 * Author:      Wahpeton Web
 * Author URI:  https://www.wahpetonweb.com/
 * License:     GPL-2.0-or-later
 */

/* Prevent direct access */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
add_action( 'wp_enqueue_scripts', 'gfvdf_enqueue_assets' );
function gfvdf_enqueue_assets() {
    /* only load on frontend (not in wp-admin or login) */
    if ( ! is_admin() ) {
        wp_enqueue_script(
            'gf-visible-disabled-fields-js',
            plugin_dir_url( __FILE__ ) . 'assets/js/gf-visible-disabled-fields.js',
            array(),
            '1.0.0',
            true
        );
        wp_enqueue_style(
            'gf-visible-disabled-fields-css',
            plugin_dir_url( __FILE__ ) . 'assets/css/gf-visible-disabled-fields.css',
            array(),
            '1.0.0'
        );
    }
}
/* add admin page under Tools */
add_action( 'admin_menu', 'gfvdf_register_admin_page' );
function gfvdf_register_admin_page() {
    add_management_page(
        'GF Visible Disabled Fields',
        'GF Visible Disabled Fields',
        'manage_options',
        'gf-visible-disabled-fields',
        'gfvdf_render_admin_page'
    );
}
function gfvdf_render_admin_page() {
    ?>
    <div class="wrap">
        <h1>GF Visible Disabled Fields</h1>
        <h3>Version: 1.0.0</h3>
        <img style="max-width:300px" src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/img/logo.png' ); ?>" alt="GF Visible Disabled Fields Logo">
        <h2>This plugin only works With Gravity Forms.</h2>
        <h2>Tested up to Gravity Forms Version 2.9.10 and WordPress 6.8.</h2>
        <p>This plugin modifies Gravity Forms' default behavior by preventing conditional logic from hiding specific fields. If a field has the CSS class <code>gf-visible-disabled</code>, it will remain visible even when conditional logic would normally hide it. The field's inputs will be disabled, allowing users to see the contents but not interact with them. This behavior is intentional. If it's not what you want, simply do not apply the class.</p>
        <p><strong>Note:</strong> Some fields that remain visible may still affect form functionality. For example, product fields that stay visible may still contribute to the total.</p>
        <h2>How to Use</h2>
        <ol>
            <li>Edit your Gravity Form.</li>
            <li>Select a field you want to remain visible.</li>
            <ul>
                <li>*Field must have conditional logic enabled.</li>
            </ul>
            <li>Under <strong>Appearance > Custom CSS Class</strong>, add: <code>gf-visible-disabled</code></li>
            <li>Save the form and test the behavior on the frontend.</li>
        </ol>
        <h2>Accessibility</h2>
        <p>When a field is conditionally disabled but still visible, a message is shown to all users below the field to explain why it's unavailable. This helps ensure accessibility and clarity.</p>
        <h2>Need Help?</h2>
        <p>Contact the developer by emailing <a href="mailto:web@wahpetonweb.com?subject=GFVDF%20Help%20Request">web@wahpetonweb.com</a> or visit <a href="https://www.wahpetonweb.com/contact/" target="_blank" rel="noopener noreferrer">wahpetonweb.com</a></p>
    </div>
    <?php
    }