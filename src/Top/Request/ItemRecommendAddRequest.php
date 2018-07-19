<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.item.recommend.add request
 *
 * @author auto create
 * @since  1.0, 2015.11.04
 */
class ItemRecommendAddRequest implements RequestInterface
{
    /**
     * 商品数字ID，该参数必须
     **/
    private $numIid;

    private $apiParas = [ ];

    public function setNumIid($numIid)
    {
        $this->numIid = $numIid;
        $this->apiParas["num_iid"] = $numIid;
    }

    public function getNumIid()
    {
        return $this->numIid;
    }

    public function getApiMethodName()
    {
        return "taobao.item.recommend.add";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->numIid, "numIid");
        RequestCheckUtil::checkMinValue($this->numIid, 0, "numIid");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
