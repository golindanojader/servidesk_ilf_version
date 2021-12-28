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



/*SESSION*/
$route['signin']                = 'Auth_Controller/ValidateSession';
$route['default_controller']    = 'pages/index';
$route['home']                  = 'pages/home';
$route['myticket']              = 'pages/myticket';
$route['ticketbox']             = 'pages/ticketbox';
$route['adminPanel']            = 'pages/adminPanel';
$route['adminHome']             = 'pages/adminHome';
$route['department']            = 'pages/department';
$route['adjust']                = 'pages/adjust';
$route['userCount']             = 'pages/userCount';
$route['usersList']             = 'pages/usersList';
$route['departmentCategories']  = 'pages/departmentCategories';
$route['uploadImage']           = 'pages/uploadImage';
// capturamos el level_1  perteneciente al departamento
$route['getInformationLevel_2'] = 'pages/getInformationLevel_2';
$route['logout']                = 'pages/logout';
$route['(:any)']                = 'pages/departmentCategories/$1';
$route['404_override']          = 'pages/index';

$route['updateUser']            = 'User_Controller/updateUser';
$route['deleteUser']            = 'User_Controller/deleteUser';

$route['updateCategorie']       = 'Department_Controller/updateCategorie';
$route['updateSubCategories']   = 'Department_Controller/updateSubCategories';
$route['deleteSubCategorie']    = 'Department_Controller/deleteSubCategorie';
$route['deleteCategorie']       = 'Department_Controller/deleteCategorie';
$route['updateDepartment']      = 'Department_Controller/updateDepartment';


$route['get_category_level_1']  = 'Ticket_Controller/get_category_level_1';
$route['public_html'] = 'pages/public_html';
$route['translate_uri_dashes']  = FALSE;
