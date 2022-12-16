<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('get_value')) {
    function get_value($name, $default = "")
    {
        if (!empty($_GET)) {
            if (isset($_GET[$name])) {
                return $_GET[$name];
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }
}

if (!function_exists('get_select')) {
    function get_select($name, $value)
    {
        if (!empty($_GET)) {
            if (isset($_GET[$name])) {
                if ($_GET[$name] == $value) {
                    return 'selected';
                }
            }
        }
    }
}
