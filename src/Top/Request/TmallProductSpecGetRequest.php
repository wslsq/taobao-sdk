<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: tmall.product.spec.get request
 *
 * @author auto create
 * @since  1.0, 2016.03.08
 */
class TmallProductSpecGetRequest implements RequestInterface
{
    /**
     * 要获取信息的产品规格信息。
     **/
    private $specId;

    private $apiParas = [ ];

    public function setSpecId($specId)
    {
        $this->specId = $specId;
        $this->apiParas["spec_id"] = $specId;
    }

    public function getSpecId()
    {
        return $this->specId;
    }

    public function getApiMethodName()
    {
        return "tmall.product.spec.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->specId, "specId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
