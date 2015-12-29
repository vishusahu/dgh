<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	example.com/clacx-admin-closed-projectsass/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
/*for web */
//$route['default_controller'] = "website/index.php";
$route['default_controller'] = "website/index";
$route['404_override'] = '';
$route['admin'] = "admin/index";
$route['user_login'] = 'admin/index/index';
$route['user-logout'] = 'admin/index/logout';
$route['about-dgh'] = 'website/index/aboutUs';
$route['admin/static-pages'] = 'admin/dghDashboard/groups';
$route['admin-dgmsg'] = 'admin/dghDashboard/dgMessage';
$route['admin/tender'] = 'admin/dghDashboard/tender';
$route['admin/pepdata'] = 'admin/dghDashboard/pepdata';
$route['admin/categories'] = 'admin/dghDashboard/categories';

//Website
$route['tender'] = 'website/index/tender';
$route['purchases'] = 'website/index/purchases';
$route['show_content'] = 'website/index/showContent';
$route["page"] = 'website/index/showHeaderPages';
$route["exploration"] = 'website/index/pcsexploration';
$route["companies"] = 'website/index/companies';
$route["consortium"] = 'website/index/consortium';
$route["discovery"] = 'website/index/discovery';
$route["screen_reader_access"] = 'website/index/screenReaderAccess';
$route["user/registration"] = 'website/index/registration';