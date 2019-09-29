<?php

namespace Yevhenii\PrivatBank\Traits;


use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

trait RequestTrait {

	/**
	 * @param $url
	 *
	 * @return string
	 */
	private function getContent( $url ) {
		$client = new Client();
		$response = $client->get($url);
		if ($response->getStatusCode() != Response::HTTP_OK){
			return 'error';
		}

		return $response->getBody()->getContents();
	}

	/**
	 * @return __anonymous@461
	 */
	private function object(){
		$object = new class{
			public $xml;
			public $json;
		};

		$object->json = $this->getUrl($this->formatJson);
		$object->xml = $this->getUrl($this->formatXml);

		return $object;
	}
}