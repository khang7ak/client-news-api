<?php

if (!function_exists('get_data_api'))
{
  function get_data_api($url, $method = null)
  {
    try {
      
        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method ?? "GET",
            ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        return json_decode($response, true);
    }
    catch(\Exception $e)
    {
      return response()->json([
        'status' => false,
        'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
        'message' => $e->getMessage(),
      ]);
    }
  }
}