<?php

class Messagesender
{
	public function sendUpdateStatus($book)
	{
		$text = "El libro {$book['book_name']} se encuentra disponible!!";
		$url =
			"https://graph.facebook.com/LATEST-API-VERSION/PAGE-ID/messages?recipient={'id':'PSID'}&messaging_type=RESPONSE&message={'text':'{$text}'}&access_token="
			. ACCESS_TOKEN_MESS;

		/*$curl = curl_init();
		curl_setopt_array(
			$curl,
			[
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST,
				'POST',
			]
		);
		curl_exec($curl);
		curl_close($curl);*/
	}
}
