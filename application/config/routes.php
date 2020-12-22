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
$route['default_controller'] = 'home/Home';
$route['404_override'] = 'notfound/C_notfound';
$route['translate_uri_dashes'] = FALSE;

// account_user

$route['contact-us']['GET'] = 'home/Home/contact_us';
$route['contact-us']['POST'] = 'home/Home/contact_us_post';

$route['transaction/list'] = 'home/Home/transaction_list';

$route['blog'] = 'home/Home/blog';
$route['login']['GET'] = 'user/Users/login_member';
$route['login']['POST'] = 'user/Users/login_post';
$route['login/checkout']['POST'] = 'user/Users/login_post';

$route['register']['GET'] = 'user/Users/register_member';
$route['register']['POST'] = 'user/Users/register_post';

$route['signout'] = 'user/Users/signout';


// Product
$route['search-product'] = 'product/Products/search_product';
$route['search'] = 'product/Products/search_product';
$route['product'] = 'product/Product';

$route['product/:any/:any/:any'] = 'product/Products/product_detail';
$route['product/:any/:any'] = 'product/Products/product_detail';
$route['product/:any'] = 'product/Products/product_category';

// Category

$route['category/:any'] = 'category/Categories/list_product_category';
$route['category/:any/:num'] = 'category/Categories/list_product_category';
$route['category/:any/:any'] = 'category/Categories/list_product_category';

// Cart
$route['cart'] = 'cart/Carts';
$route['cart/add_to_cart'] = 'cart/Carts/add_to_cart';
$route['cart/update_cart'] = 'cart/Carts/update_cart';
$route['cart/delete_cart/:any'] = 'cart/Carts/delete_cart';

// Checkout 

$route['checkout'] = 'cart/Carts/checkout';
$route['checkout/token'] = 'cart/Carts/checkout_token';
$route['checkout/shipping_total'] = 'cart/Carts/checkout_shipping_total';
$route['checkout/payment'] = 'cart/Carts/checkout_payment';
$route['checkout/update_address'] = 'cart/Carts/checkout_update_address';

// Shipping Cost
$route['province'] = 'home/Home/shipping_cost';
$route['city'] = 'home/Home/shipping_cost';
$route['shipping'] = 'home/home/shipping_cost';

//language

$route['id'] = "home/Home/switch_language/indonesia";
$route['en'] = "home/Home/switch_language/english";

$route['currency/idr'] = "home/Home/switch_currency/IDR";
$route['currency/usd'] = "home/Home/switch_currency/USD";


// API transaction

$route['transaction'] = 'transaction/Transaction/jl_pay';
$route['transaction/upload'] = 'transaction/Transaction/transaction_upload';
$route['transaction/transfer_img'] = 'transaction/Transaction/transfer_img';

$route['transaction/manual_transfer'] = 'transaction/Transaction/manual_transfer';


$route['transaction/invoice'] = 'transaction/Transaction/invoice';
$route['transaction/finish'] = 'transaction/Transaction/finish_pay';
$route['detail_tracking'] = 'transaction/Transaction/detail_tracking';
// Admin


$route['admin-jb-brg'] = 'admin/Admins';
$route['admin-jb-brg/login']['GET'] = 'admin/Admins/login';
$route['admin-jb-brg/login']['POST'] = 'admin/Admins/login_action';

$route['admin-jb-brg/category'] = 'admin/Admins/category';
$route['admin-jb-brg/category/add']['GET'] = 'admin/Admins/add_category';
$route['admin-jb-brg/category/add']['POST'] = 'admin/Admins/add_category_post';
$route['admin-jb-brg/category/edit'] = 'admin/Admins/edit_category';
$route['admin-jb-brg/category/delete'] = 'admin/Admins/delete_category';

$route['admin-jb-brg/currency'] = 'admin/Admins/currency';
$route['admin-jb-brg/currency/update']['GET'] = 'admin/Admins/edit_currency';
$route['admin-jb-brg/currency/update']['POST'] = 'admin/Admins/edit_currency_post';

$route['admin-jb-brg/category/edit'] = 'admin/Admins/edit_category';
$route['admin-jb-brg/category/delete'] = 'admin/Admins/delete_category';
$route['admin-jb-brg/sub_category'] = 'admin/Admins/sub_category';
$route['admin-jb-brg/sub_category/add']['GET'] = 'admin/Admins/add_sub_category';
$route['admin-jb-brg/sub_category/add']['POST'] = 'admin/Admins/add_sub_category_post';
$route['admin-jb-brg/sub_category/edit'] = 'admin/Admins/edit_sub_category';
$route['admin-jb-brg/sub_category/delete'] = 'admin/Admins/delete_sub_category';

$route['admin-jb-brg/product'] = 'admin/Admins/product';
$route['admin-jb-brg/product'] = 'admin/Admins/product';
$route['admin-jb-brg/product/add']['GET'] = 'admin/Admins/add_product';
$route['admin-jb-brg/product/add']['POST'] = 'admin/Admins/add_product_post';
$route['admin-jb-brg/product/edit'] = 'admin/Admins/edit_product';
$route['admin-jb-brg/product/delete'] = 'admin/Admins/delete_product';

$route['admin-jb-brg/list-transaction'] = 'admin/Admins/transaction';
$route['admin-jb-brg/list-transaction/detail/:any'] = 'admin/Admins/transaction_detail';
$route['admin-jb-brg/list-transaction/tracking/:any'] = 'admin/Admins/transaction_tracking';
$route['admin-jb-brg/list-transaction/tracking']['POST'] = 'admin/Admins/transaction_tracking_post';
$route['admin-jb-brg/list-transaction/tracking']['POST'] = 'admin/Admins/transaction_tracking_post';
$route['admin-jb-barang/list-transaction/update_status_transaction']['POST'] = 'admin/Admins/update_status_transaction';

$route['admin-jb-brg/list-affiliate'] = 'admin/Admins/affiliate';
$route['admin-jb-brg/list-affiliate/add']['GET'] = 'admin/Admins/add_affiliate';
$route['admin-jb-brg/list-affiliate/add']['POST'] = 'admin/Admins/add_affiliate_post';
$route['admin-jb-brg/list-affiliate/detail/:any'] = 'admin/Admins/transaction_detail';
$route['admin-jb-brg/list-affiliate/tracking/:any'] = 'admin/Admins/transaction_tracking';
$route['admin-jb-brg/list-affiliate/tracking']['POST'] = 'admin/Admins/transaction_tracking_post';
$route['admin-jb-brg/list-affiliate/tracking']['POST'] = 'admin/Admins/transaction_tracking_post';
$route['admin-jb-barang/list-affiliate/update_status_transaction']['POST'] = 'admin/Admins/update_status_transaction';


$route['admin-jb-brg/contact'] = 'admin/Admins/contact';


$route['category_select'] = 'admin/Admins/category_select';