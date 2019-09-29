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

class PrivatBankArchiveCurrencyRates extends PrivatBank {
	use RequestTrait;

	private $date;
	private $uriExchangeRates = 'exchange_rates?';

	public function archiveExchangeRates( $d_m_y ) {
		$this->date = Carbon::parse($d_m_y)->format('d.m.Y');
		return $this->object();
	}

	private function getUrl($format){
		$url = $this->baseUrl . $this->uriExchangeRates . $format . '&date=' . $this->date;

		return $this->getContent($url);
	}
}