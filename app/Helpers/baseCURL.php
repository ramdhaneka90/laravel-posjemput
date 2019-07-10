<?php 
namespace App\Helpers;

/**
 * 
 */
class baseCURL
{	
	function OngkirCURL($url)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/".$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: c0d0fbb49debcc8b46adf327e66f43ba"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

				if ($err) {
		  echo "cURL Error #:" . $err;
		}
		$data = json_decode($response,true);

		return $data['rajaongkir'];

	}

	 public static function instance()
     {
         return new baseCURL();
     }
}

?>