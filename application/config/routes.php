<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'auth/login';
$route['auth'] = "auth/login";
$route['auth/user_list/(:num)'] = 'auth/user_list';
$route['auth/edit_user/(:any)'] = "auth/edit_user/$1";

$route['auth/cms'] = "cms/admin_list";
$route['auth/cms/list'] = "cms/admin_list";
$route['auth/cms/create'] = "cms/create";
$route['auth/cms/success'] = "cms/success";
$route['auth/cms/edit/(:any)'] = "cms/edit/$1";
$route['auth/cms/del_record/(:any)'] = "cms/del_record/$1";
$route['auth/cms/publish_record/(:any)'] = "cms/publish_record/$1";
$route['auth/cms/unpublish_record/(:any)'] = "cms/unpublish_record/$1";


$route['news'] = "news/index";
$route['news/(:any)'] = "news/view/$1";

$route['admin/home'] = "admin_home/index";
$route['admin/login'] = "admin_home/login";
$route['admin/news'] = "news/admin_list";
$route['admin/news/create'] = "news/create";
$route['admin/news/success'] = "news/success";
$route['admin/news/(:any)'] = "news/admin_view/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
