<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii
 * Date: 06.06.2019
 * Time: 21:53
 */

namespace Yevhenii\PrivatBank\Traits;


use Yevhenii\PrivatBank\Info\PrivatBankArchiveCurrencyRates;
use Yevhenii\PrivatBank\Info\PrivatBankDepartments;
use Yevhenii\PrivatBank\Info\PrivatBankExchangeRate;
use Yevhenii\PrivatBank\Info\PrivatBankInfrastructure;

trait InfoTrait {

	public function exchangeRate(  ) {
		return new PrivatBankExchangeRate();
	}

	public function archiveExchangeRates( $d_m_y ) {
		return (new PrivatBankArchiveCurrencyRates())->archiveExchangeRates($d_m_y);
	}

	public function departments( $city = null, $street = null ) {
		return (new PrivatBankDepartments($city, $street))->departments();
	}

	public function cashMachine( $city = null, $street = null ) {
		return (new PrivatBankInfrastructure($city, $street));
	}
}