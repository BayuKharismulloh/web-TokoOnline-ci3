<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('site_name')) {
    function site_name()
    {
        $ci = get_instance();

        $ci->load->config('site_settings', TRUE);
        return $ci->config->item('site_name', 'site_settings');
    }
}

if (!function_exists('site_logo')) {
    function site_logo()
    {
        $ci = get_instance();

        $ci->load->config('site_settings', TRUE);
        return $ci->config->item('site_logo', 'site_settings');
    }
}

if (!function_exists('site_favicon')) {
    function site_favicon()
    {
        $ci = get_instance();

        $ci->load->config('site_settings', TRUE);
        return $ci->config->item('site_favicon', 'site_settings');
    }
}
