<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.scitem.outercode.get request
 *
 * @author auto create
 * @since  1.0, 2012.11.28
 */
class ScitemOutercodeGetRequest implements RequestInterface
{
    /**
     * 商品编码
     **/
    private $outerCode;

    private $apiParas = [ ];

    public function setOuterCode($outerCode)
    {
        $this->outerCode = $outerCode;
        $this->apiParas["outer_code"] = $outerCode;
    }

    public function getOuterCode()
    {
        return $this->outerCode;
    }

    public function getApiMethodName()
    {
        return "taobao.scitem.outercode.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->outerCode, "outerCode");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
