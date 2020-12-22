<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Curl_Request
{
	public function __construct()
	{

	}
	public function curl_post($url, $sendData = array(), $auth = '')
	{
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('key: '.$auth));
        $result = curl_exec($ch);
        
        $headers=array();

        $data=explode("\n",$result);


        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        
        
        $resval = (array)json_decode(end($data), true);

        return $resval;
	}
	public function curl_get($url, $sendData = '', $auth = '')
	{
		error_reporting(0);
		$ch = curl_init();
		$options = array(
			CURLOPT_URL			 => $url.$sendData,
			CURLOPT_RETURNTRANSFER => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",
	          CURLOPT_POST           =>false,
	          CURLOPT_FOLLOWLOCATION => false,
	          CURLOPT_SSL_VERIFYPEER => 0,
	          CURLOPT_HEADER         => 1,
	          CURLOPT_HTTPHEADER	 => array('key: '.$auth)

	      );
		curl_setopt_array($ch, $options);
		$content = curl_exec($ch);
		curl_close($ch);
		$headers=array();

		$data=explode("\n",$content);
		$headers['status']=$data[0];

		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data), true);
        return $resval;
	}
	public function curl_post_auth($url, $sendData = array(), $auth = '')
	{
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'/'.$sendData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
        $result = curl_exec($ch);
        
        $headers=array();

        $data=explode("\n",$result);


        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        
        
        $resval = (array)json_decode(end($data), true);

        $data_return['data'] = $resval;
        $data_return['bbo_auth'] = $headers['BABOO-AUTH-KEY'];

        return $data_return;
	}
	function currency_convert($currency_from,$currency_to,$currency_input){
	    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
	    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
	    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
	    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
	    $yql_session = file_get_contents($yql_query_url);
	    $yql_json =  json_decode($yql_session,true);
	    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

	    return $currency_output;
	}

}