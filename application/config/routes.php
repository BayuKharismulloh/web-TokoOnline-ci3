<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'guest/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Guest Section

$route['home'] = 'guest/home/index';

$route['product'] = 'guest/product/index';
$route['product/(:num)'] = 'guest/product/detail/$1';

// Admin Section

$route['admin'] = 'admin/dashboard/index';
$route['admin/dashboard'] = 'admin/dashboard/index';

$route['admin/sign-in'] = 'admin/auth/sign_in';
$route['admin/sign-up'] = 'admin/auth/sign_up';
$route['admin/sign-out'] = 'admin/auth/sign_out';

$route['admin/user'] = 'admin/user/index';
$route['admin/user/add'] = 'admin/user/add';
$route['admin/user/edit/(:num)'] = 'admin/user/edit/$1';
$route['admin/user/delete']['POST'] = 'admin/user/delete';

$route['admin/setting'] = 'admin/setting/index';

$route['admin/category'] = 'admin/category/index';
$route['admin/category/add'] = 'admin/category/add';
$route['admin/category/edit/(:num)'] = 'admin/category/edit/$1';
$route['admin/category/delete']['POST'] = 'admin/category/delete';

$route['admin/product'] = 'admin/product/index';
$route['admin/product/add'] = 'admin/product/add';
$route['admin/product/edit/(:num)'] = 'admin/product/edit/$1';
$route['admin/product/delete']['POST'] = 'admin/product/delete';

$route['admin/carousel'] = 'admin/carousel/index';
$route['admin/carousel/add'] = 'admin/carousel/add';
$route['admin/carousel/edit/(:num)'] = 'admin/carousel/edit/$1';
$route['admin/carousel/delete']['POST'] = 'admin/carousel/delete';

$route['admin/approval'] = 'admin/approval/index';
$route['admin/approval/approve']['POST'] = 'admin/approval/approve';
$route['admin/approval/deny']['POST'] = 'admin/approval/deny';
