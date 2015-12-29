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
$route['photo/categories'] = 'admin/dghDashboard/photoCategories';
$route['admin/gallery'] = 'admin/dghDashboard/gallery';
$route['admin/stories'] = 'admin/dghDashboard/stories';
$route['admin/upload'] = 'admin/dghDashboard/downloads';

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
$route["static_page"] = 'website/index/staticPage';
$route["login"] = 'website/index/loginUser';
$route["logout"] = 'website/index/logout';
$route["language"] = 'website/index/changeLanguage';
$route["contact_webmaster"] = 'website/index/webmaster';
$route["disclaimer"] = 'website/index/disclaimer';
$route["gallery"] = 'website/index/gallery';
$route["feedback"] = 'website/index/feedback';
$route["sitemap"] = 'website/index/sitemap';
$route["vigilance_complaints"] = 'website/index/vigilanceComplaints';
$route["for_general_users"] = 'website/index/forGeneralUsers';
$route["glossary"] = 'website/index/glossary';
$route["rti_act"] = 'website/index/rti';
$route["for_public_users"] = 'website/index/forPublicUsers';
$route["check_token_page"] = 'website/index/checkTokenPage';
$route["about_us"] = 'website/index/aboutUs';
$route["destination"] = 'website/index/destination';
$route["psc_fields_view_details"] = 'website/index/pscFieldsViewDetails';
$route["story_details"] = 'website/index/story_details';
$route["gallery_cat"] = 'website/index/galleryCategory';
$route["all_story"] = 'website/index/getAllStories';
$route["vigilance_code_view"] = 'website/index/vigilanceCode';
$route["archive_tender"] = 'website/index/archiveTender';
$route["block_name"] = 'website/index/blockName';
$route["show_block_lists"] = 'website/index/showBlockLists';
$route["show_block_details"] = 'website/index/showBlockDetails';
$route["show_discovery_list"] = 'website/index/showDiscoveryList';
$route["show_discovery_details"] = 'website/index/showDiscoveryDetails';
$route["show_round_list"] = 'website/index/showRoundList';
$route["show_round_details"] = 'website/index/showRoundDetails';
$route["view_block_details"] = 'website/index/viewBlockDetails';