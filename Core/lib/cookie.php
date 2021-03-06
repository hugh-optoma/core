<?php
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\Cookie\PhpCookieManager;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\PublicCookieMetadata;
use Magento\Store\Model\StoreCookieManager;
use Magento\Store\Api\StoreCookieManagerInterface;
/**
 * 2016-06-06
 * @return CookieManagerInterface|PhpCookieManager
 */
function df_cookie_m() {return df_o(CookieManagerInterface::class);}

/**
 * 2016-06-06
 * @return CookieMetadataFactory
 */
function df_cookie_metadata() {return df_o(CookieMetadataFactory::class);}

/**
 * 2016-06-06
 * @return PublicCookieMetadata
 */
function df_cookie_metadata_standard() {
	/** @var PublicCookieMetadata $result */
	$result = df_cookie_metadata()->createPublicCookieMetadata();
	$result->setDurationOneYear();
	$result->setPath('/');
	$result->setHttpOnly(false);
	return $result;
}

/**
 * 2015-11-04
 * @return StoreCookieManagerInterface|StoreCookieManager
 */
function df_store_cookie_m() {return df_o(StoreCookieManagerInterface::class);}

