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

class PrivatBankExchangeRate extends PrivatBank {
	use RequestTrait;

	private $type;

	public function exchangeRateCash(){
		$this->type = 5;
		return $this->object();
	}

	public function exchangeRateNonCash() {
		$this->type = 11;
		return $this->object();
	}

	private function getUrl($format){
		$url = $this->baseUrl . $this->infoApi . $format . '&exchange&coursid=' . $this->type;

		return $this->getContent($url);
	}
}