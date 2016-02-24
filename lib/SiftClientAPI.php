<?php

namespace siftlogic;

class SiftClientAPI
{
	protected $api_key = 'API_KEY';
	protected $api_host = 'http://api.mydatamanage.com:8080/api/live/verify';
	protected $api_port = '8080';

	public function __construct($api_key)
	{
        $this->api_key = $api_key;
	}

	public function verify_email($email)
	{
		$payload = array(
			'email' => $email
		);

		return $this->api_request($payload);
	}

	protected function api_request($payload)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_PORT => $this->api_port,
			CURLOPT_URL => $this->api_host,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($payload),
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}
}