<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.fenxiao.dealer.requisitionorder.agree request
 *
 * @author auto create
 * @since  1.0, 2016.04.13
 */
class FenxiaoDealerRequisitionorderAgreeRequest implements RequestInterface
{
    /**
     * 采购申请/经销采购单编号
     **/
    private $dealerOrderId;

    private $apiParas = [ ];

    public function setDealerOrderId($dealerOrderId)
    {
        $this->dealerOrderId = $dealerOrderId;
        $this->apiParas["dealer_order_id"] = $dealerOrderId;
    }

    public function getDealerOrderId()
    {
        return $this->dealerOrderId;
    }

    public function getApiMethodName()
    {
        return "taobao.fenxiao.dealer.requisitionorder.agree";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->dealerOrderId, "dealerOrderId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
