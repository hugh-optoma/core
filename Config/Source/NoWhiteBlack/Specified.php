<?php
namespace Df\Config\Source\NoWhiteBlack;
use Df\Config\Source\NoWhiteBlack;
class Specified extends NoWhiteBlack {
	/**
	 * 2016-05-13
	 * @override
	 * @see \Df\Config\Source\NoWhiteBlack::titles()
	 * @used-by \Df\Config\Source\NoWhiteBlack::map()
	 * @return string[]
	 */
	protected function titles() {return [
		self::WHITELIST => 'Specified', self::BLACKLIST => 'All But Specified'
	];}

}