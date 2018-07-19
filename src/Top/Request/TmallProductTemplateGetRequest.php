<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: tmall.product.template.get request
 *
 * @author auto create
 * @since  1.0, 2016.04.13
 */
class TmallProductTemplateGetRequest implements RequestInterface
{
    /**
     * 类目ID
     **/
    private $cid;

    private $apiParas = [ ];

    public function setCid($cid)
    {
        $this->cid = $cid;
        $this->apiParas["cid"] = $cid;
    }

    public function getCid()
    {
        return $this->cid;
    }

    public function getApiMethodName()
    {
        return "tmall.product.template.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->cid, "cid");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
