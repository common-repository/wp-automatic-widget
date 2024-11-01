<?php
/*
Plugin Name: wp_automatic_widget
Plugin URI: http://wordpress.org/plugins/wp-automatic-widget/
Description: This wordpress plugin enables you to have a dynamic sidebar in a way that you can post automatically in there.
Author: Codstack Team
Version: 1.0.1
Author URI: http://www.codstack.com/
*/

// Add Widget
require_once 'wp_automatic_widget_core.php';
add_action('widgets_init', 'wp_automatic_widget_core::register_automatic_widget');
add_action('admin_init', 'wp_automatic_widget_core::add_wp_automatic_widget_css');
add_action('init', 'wp_automatic_widget_core::add_wp_automatic_widget_initialize_shortcode_css');
add_action('admin_init', 'wp_automatic_widget_core::add_wp_automatic_widget_javascript');

add_shortcode( 'bootstrap_alert', array('wp_automatic_widget_bootstrap_shortcodes', 'bootstrap_alerts') );
add_shortcode( 'bootstrap_button_group', array('wp_automatic_widget_bootstrap_shortcodes', 'bootstrap_button_groups') );
add_shortcode( 'bootstrap_button', array('wp_automatic_widget_bootstrap_shortcodes', 'bootstrap_buttons') );
add_shortcode( 'bootstrap_icon', array('wp_automatic_widget_bootstrap_shortcodes', 'bootstrap_icons') );
add_shortcode( 'bootstrap_hero_unit', array('wp_automatic_widget_bootstrap_shortcodes', 'bootstrap_hero_units') );
add_shortcode( 'bootstrap_well', array('wp_automatic_widget_bootstrap_shortcodes', 'bootstrap_wells') );
add_filter('widget_text', 'do_shortcode');

register_uninstall_hook(__FILE__,'plugin_auto_widget_uninstall');

if ( ! wp_next_scheduled( 'auto_widget_task' ) )
{
    wp_schedule_event(time(), 'hourly', 'auto_widget_task');
}
add_action('auto_widget_task', 'remove_widgets_from_site');
function remove_widgets_from_site()
{
    $auto_widgets = get_option("widget_wp_automatic_widget_core");
    $now = date("Ymd");

    if(is_array($auto_widgets))
    {
        foreach($auto_widgets as $key => $value)
        {
            if($value["manually_auto_widget"] == "auto")
            {
                $end_date = date("Ymd", strtotime($value["manually_auto_widget_end_date"]));
                if($now >= $end_date)
                {
                    unset($auto_widgets[$key]);
                    continue;
                }
            }

            if($value["manually_auto_widget"] == "deadline")
            {
                $end_date = date("Ymd", strtotime($value["manually_auto_widget_end_date_deadline"]));
                if($now >= $end_date)
                {
                    unset($auto_widgets[$key]);
                    continue;
                }
            }
        }
        $new_value = $auto_widgets;
        update_option( "widget_wp_automatic_widget_core", $new_value );
    }
}
add_action('wp_dashboard_setup', 'wp_automatic_widget_core::auto_widget_add_dashboard_widgets' );


function plugin_auto_widget_uninstall()
{
    wp_clear_scheduled_hook( 'auto_widget_task' );
}

?>