<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii
 * Date: 08.06.2019
 * Time: 15:30
 */

namespace Yevhenii\PrivatBank\Info;


use Carbon\Carbon;
use Yevhenii\PrivatBank\PrivatBank;
use Yevhenii\PrivatBank\Traits\RequestTrait;

class PrivatBankDepartments extends PrivatBank {

	use RequestTrait;

	private $city;
	private $street;
	private $uriDepartments = 'pboffice?';

	public function __construct($city = null, $street = null) {
		$this->city = $city;
		$this->street = $street;
	}

	public function departments() {
		return $this->object();
	}

	private function getUrl($format){
		$url = $this->baseUrl . $this->uriDepartments . $format . '&city=' . $this->city . '&address=' . $this->street;

		return $this->getContent($url);
	}
}