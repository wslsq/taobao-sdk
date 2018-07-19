<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wlb.waybill.i.search request
 *
 * @author auto create
 * @since  1.0, 2015.11.03
 */
class WlbWaybillISearchRequest implements RequestInterface
{
    /**
     * 查询网点信息
     **/
    private $waybillApplyRequest;

    private $apiParas = [ ];

    public function setWaybillApplyRequest($waybillApplyRequest)
    {
        $this->waybillApplyRequest = $waybillApplyRequest;
        $this->apiParas["waybill_apply_request"] = $waybillApplyRequest;
    }

    public function getWaybillApplyRequest()
    {
        return $this->waybillApplyRequest;
    }

    public function getApiMethodName()
    {
        return "taobao.wlb.waybill.i.search";
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
