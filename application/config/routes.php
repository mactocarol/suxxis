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

|	example.com/class/method/id/

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



//include(APPPATH.'third_party/custom_routes.php');

//$CustomRoutes = new custom_routes();



$route['default_controller'] = "welcome";

$route['404_override'] = '';

$route['Home'] = "welcome/index/";
$route['About-us'] = "welcome/about_us/";
$route['Contact-us'] = "welcome/contact_us/";
$route['Services'] = "welcome/services/";
$route['Support'] = "welcome/support/";
$route['Find-car'] = "welcome/find_car/";
$route['Become-partner'] = "welcome/partner/";

$route['Login'] = "user/index/";
$route['Logout'] = "user/logout/";
$route['Signup'] = "user/user_register/";
$route['Update-profile'] = "user/update_profile/";
$route['BookingMade'] = "user/BookingMade/";
$route['BookingReceived'] = "user/BookingReceived/";
$route['Transactions'] = "user/transactions/";

$route['My-cars'] = "partner";
$route['Add-car'] = "partner/add";
$route['Delete-car/(:any)'] = "partner/delete/$1";
$route['Car-Detail/(:num)'] = "car/detail/$1";
$route['Booking/(:num)'] = "car/booking/$1";

$route['Book'] = "car/buy";
$route['Booking/success'] = "car/success";
$route['Booking/cancel'] = "car/cancel";
$route['Booking/ipn'] = "car/ipn";
$route['Booking/thankyou'] = "car/thankyou";
/* End of file routes.php */

/* Location: ./application/config/routes.php */





