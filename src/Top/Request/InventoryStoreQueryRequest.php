<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.inventory.store.query request
 *
 * @author auto create
 * @since  1.0, 2016.03.16
 */
class InventoryStoreQueryRequest implements RequestInterface
{
    /**
     * 商家的仓库编码
     **/
    private $storeCode;

    private $apiParas = [ ];

    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
        $this->apiParas["store_code"] = $storeCode;
    }

    public function getStoreCode()
    {
        return $this->storeCode;
    }

    public function getApiMethodName()
    {
        return "taobao.inventory.store.query";
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
