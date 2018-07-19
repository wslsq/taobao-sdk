<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.fenxiao.productcat.delete request
 *
 * @author auto create
 * @since  1.0, 2016.04.13
 */
class FenxiaoProductcatDeleteRequest implements RequestInterface
{
    /**
     * 产品线ID
     **/
    private $productLineId;

    private $apiParas = [ ];

    public function setProductLineId($productLineId)
    {
        $this->productLineId = $productLineId;
        $this->apiParas["product_line_id"] = $productLineId;
    }

    public function getProductLineId()
    {
        return $this->productLineId;
    }

    public function getApiMethodName()
    {
        return "taobao.fenxiao.productcat.delete";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->productLineId, "productLineId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
