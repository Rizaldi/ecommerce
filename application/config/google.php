<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

$CI =& get_instance();
$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$clientid = '625200931795-v9j07677ch7drvplu5ohpph4u48b4277.apps.googleusercontent.com';
$clientsecret = '9a-ThTIiKvuELANSjq-HFn4g';

$config['google']['client_id']        = $clientid;
$config['google']['client_secret']    = $clientsecret;
$config['google']['redirect_uri']     = base_url().'auth/C_Login/google_login';
$config['google']['application_name'] = 'BabooLoginApp ';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();