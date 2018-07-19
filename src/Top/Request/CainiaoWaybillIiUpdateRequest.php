<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: cainiao.waybill.ii.update request
 *
 * @author auto create
 * @since  1.0, 2016.06.07
 */
class CainiaoWaybillIiUpdateRequest implements RequestInterface
{
    /**
     * 更新请求信息
     **/
    private $paramWaybillCloudPrintUpdateRequest;

    private $apiParas = [ ];

    public function setParamWaybillCloudPrintUpdateRequest($paramWaybillCloudPrintUpdateRequest)
    {
        $this->paramWaybillCloudPrintUpdateRequest = $paramWaybillCloudPrintUpdateRequest;
        $this->apiParas["param_waybill_cloud_print_update_request"] = $paramWaybillCloudPrintUpdateRequest;
    }

    public function getParamWaybillCloudPrintUpdateRequest()
    {
        return $this->paramWaybillCloudPrintUpdateRequest;
    }

    public function getApiMethodName()
    {
        return "cainiao.waybill.ii.update";
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
