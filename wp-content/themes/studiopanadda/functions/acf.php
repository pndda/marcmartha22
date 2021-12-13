<?php 
/*
Plugin Name: ACF WP-CLI
Version: 1.0
Description: ACF WP Cli custom commands
Author: Sensio Grey
*/

class ACF_Command
{
    function sync($args, $assoc_args)
    {
        $groups = acf_get_field_groups();
        $sync = [];
        if (empty($groups)) {
            return WP_CLI::success('> Nothing to synchronize.');
        }
        foreach ($groups as $group) {
            $local = acf_maybe_get($group, 'local', false);
            $modified = acf_maybe_get($group, 'modified', 0);
            $private = acf_maybe_get($group, 'private', false);
            if ($local !== 'json' || $private) {
            } elseif (!$group['ID']) {
                $sync[$group['key']] = $group;
            } elseif ($modified && $modified > get_post_modified_time('U', true, $group['ID'], true)) {
                $sync[$group['key']] = $group;
            }
        }
        if (empty($sync)) {
            return WP_CLI::success('> Nothing to synchronize.');
        }
        if (!empty($sync)) {
            $new_ids = array();
            foreach ($sync as $key => $v) {
                if (acf_have_local_fields($key)) {
                    $sync[$key]['fields'] = acf_get_local_fields($key);
                }
                $field_group = acf_import_field_group($sync[$key]);
            }
            WP_CLI::success('> ACF has been synchronized successfull.');
        }
    }
}

if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('acf', 'ACF_Command');
}

/**
 * ACF Options pages
 */

$site_name = get_bloginfo('name') . ' Settings';

if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => $site_name,
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
        'icon_url' => 'dashicons-layout',
    ));
}

/**
 * Translate ACF Options pages
 */

if(function_exists('pll_default_language')){
    function stdp_acf_settings_default_language($language)
    {
        return pll_default_language("slug");
    }
    function stdp_acf_settings_current_language($language)
    {
        return pll_current_language("slug");
    }
    add_filter('acf/settings/default_language', 'stdp_acf_settings_default_language');
    add_filter('acf/settings/current_language', 'stdp_acf_settings_current_language');
}

/**
 * Set default ACF values
 */

function set_default_true_false_value($field)
{
    $field['ui'] = true;
    return $field;
}

add_filter('acf/load_field/type=select', 'set_default_true_false_value');
add_filter('acf/load_field/type=true_false', 'set_default_true_false_value');

/**
 * Populate ACF select field options with Gravity Forms forms
 */

function acf_populate_gf_forms_ids($field)
{
    if (class_exists('GFFormsModel')) {
        $choices = [];
        foreach (\GFFormsModel::get_forms() as $form) {
            $choices[$form->id] = $form->title;
        }
        $field['choices'] = $choices;
    }
    return $field;
}

add_filter('acf/load_field/name=formID_forms', 'acf_populate_gf_forms_ids');
