<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wireless.bunting.shop.shorturl.create request
 *
 * @author auto create
 * @since  1.0, 2014.07.22
 */
class WirelessBuntingShopShorturlCreateRequest implements RequestInterface
{
    /**
     * 商店id
     **/
    private $shopId;

    private $apiParas = [ ];

    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
        $this->apiParas["shop_id"] = $shopId;
    }

    public function getShopId()
    {
        return $this->shopId;
    }

    public function getApiMethodName()
    {
        return "taobao.wireless.bunting.shop.shorturl.create";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
