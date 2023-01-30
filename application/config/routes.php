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
$route['default_controller'] = 'pages';
$route['about'] = 'pages/about';
$route['products'] = 'pages/products';
$route['privacy_policy'] = 'pages/privacy_policy';
$route['panel'] = 'admin/products';
$route['stock/add/(:any)'] = 'admin/stock_add';
$route['stock/update'] = 'admin/stock_update';
$route['orders'] = 'admin/orders';
$route['sales'] = 'admin/sales';
$route['order/view_details/(:any)'] = 'admin/order_details';
$route['status/update'] = 'admin/change_order_status';
$route['login'] = 'admin';
$route['login/parse'] = 'admin/login_parse';
$route['accounts'] = 'admin/accounts';
$route['account/insert'] = 'admin/account_insert';
$route['product/insert'] = 'admin/product_upload';
$route['product/edit/(:any)'] = 'admin/product_edit';
$route['account/edit/(:any)'] = 'admin/account_edit';
$route['account/update'] = 'admin/account_update';
$route['account/delete/(:any)'] = 'admin/account_delete';
$route['product/update'] = 'admin/product_update';
$route['product/delete/(:any)'] = 'admin/product_delete';
$route['brands/(:any)'] = 'pages/get_brand_items';
$route['show/item/(:any)'] = 'pages/show_item';
$route['item/addToCart/(:any)'] = 'mycart/add_to_cart';
$route['item/remove/(:any)'] = 'mycart/remove_item'; 
$route['view_cart'] = 'mycart/view_cart'; 
$route['clear_cart'] = 'mycart/clear_cart';
$route['register'] = 'pages/register'; 
$route['account'] = 'pages/account';
$route['update_account'] = 'pages/update_info';
$route['update_account/(:any)'] = 'pages/account_update';
$route['sign_in'] = 'pages/sign_in';
$route['user_logout'] = 'pages/user_log_out';
$route['log_out'] = 'pages/log_out';
$route['Nike'] = 'pages/nike';
$route['Nike/price_low'] = 'pages/nike_price_low';
$route['Nike/price_high'] = 'pages/nike_price_high';
$route['Nike/(:any)'] = 'pages/nike';
$route['Rebook'] = 'pages/rebook';
$route['Rebook/price_low'] = 'pages/rebook_price_low';
$route['Rebook/price_high'] = 'pages/rebook_price_high';
$route['Rebook/(:any)'] = 'pages/rebook';
$route['Adidas'] = 'pages/adidas';
$route['Adidas/price_low'] = 'pages/adidas_price_low';
$route['Adidas/price_high'] = 'pages/adidas_price_high';
$route['Adidas/(:any)'] = 'pages/adidas';
$route['UnderArmour'] = 'pages/under_armour';
$route['UnderArmour/price_low'] = 'pages/under_armour_price_low';
$route['UnderArmour/price_high'] = 'pages/under_armour_price_high';
$route['UnderArmour/(:any)'] = 'pages/under_armour';
$route['Puma'] = 'pages/puma';
$route['Puma/price_low'] = 'pages/puma_price_low';
$route['Puma/price_high'] = 'pages/puma_price_high';
$route['Puma/(:any)'] = 'pages/puma';
$route['Jordan'] = 'pages/jordan';
$route['Jordan/price_low'] = 'pages/jordan_price_low';
$route['Jordan/price_high'] = 'pages/jordan_price_high';
$route['Jordan/(:any)'] = 'pages/jordan';
$route['Lining'] = 'pages/lining';
$route['Lining/price_low'] = 'pages/lining_price_low';
$route['Lining/price_high'] = 'pages/lining_price_high';
$route['Lining/(:any)'] = 'pages/lining';
$route['DC'] = 'pages/dc';
$route['DC/price_low'] = 'pages/dc_price_low';
$route['DC/price_high'] = 'pages/dc_price_high';
$route['DC/(:any)'] = 'pages/dc';
$route['Converse'] = 'pages/converse';
$route['Converse/price_low'] = 'pages/converse_price_low';
$route['Converse/price_high'] = 'pages/converse_price_high';
$route['search/item'] = 'pages/search_item';
$route['order/(:any)'] = 'mycart/order';
$route['success/(:any)'] = 'mycart/success';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
