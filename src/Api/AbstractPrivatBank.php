<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii
 * Date: 06.06.2019
 * Time: 21:44
 */

namespace Yevhenii\PrivatBank\Api;


abstract class AbstractPrivatBank {

	protected $baseUrl = 'https://api.privatbank.ua/p24api/';

	protected $infoApi = 'pubinfo?';

	protected $formatJson = 'json';
	protected $formatXml = 'xml';

	abstract public function exchangeRate();
}