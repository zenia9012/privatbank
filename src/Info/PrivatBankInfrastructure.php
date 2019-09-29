<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii
 * Date: 08.06.2019
 * Time: 15:30
 */

namespace Yevhenii\PrivatBank\Info;


use Yevhenii\PrivatBank\PrivatBank;
use Yevhenii\PrivatBank\Traits\RequestTrait;

class PrivatBankInfrastructure extends PrivatBank {
	use RequestTrait;

	private $city;
	private $street;
	private $typeMachine;
	private $uri = 'infrastructure?';

	public function __construct($city = null, $street = null) {
		$this->city = $city;
		$this->street = $street;
	}

	public function atm() {
		$this->typeMachine = 'atm';
		return $this->object();
	}

	public function selfService() {
		$this->typeMachine = 'tso';
		return $this->object();
	}

	private function getUrl($format){
		$url = $this->baseUrl . $this->uri . $format . '&' . $this->typeMachine .'&city=' . $this->city . '&address=' . $this->street;

		return $this->getContent($url);
	}
}