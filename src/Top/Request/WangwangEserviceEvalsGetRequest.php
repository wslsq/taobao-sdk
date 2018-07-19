<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wangwang.eservice.evals.get request
 *
 * @author auto create
 * @since  1.0, 2013.11.05
 */
class WangwangEserviceEvalsGetRequest implements RequestInterface
{
    /**
     * 结束时间。结束时间和开始时间间隔必须在7天内
     **/
    private $endDate;

    /**
     * 想要查询的账号列表
     **/
    private $serviceStaffId;

    /**
     * 开始时间。查询的开始时间和当前时间比，不能超过14天。且开始时间和结束时间间隔，必须在7天内。
     **/
    private $startDate;

    private $apiParas = [ ];

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        $this->apiParas["end_date"] = $endDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setServiceStaffId($serviceStaffId)
    {
        $this->serviceStaffId = $serviceStaffId;
        $this->apiParas["service_staff_id"] = $serviceStaffId;
    }

    public function getServiceStaffId()
    {
        return $this->serviceStaffId;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        $this->apiParas["start_date"] = $startDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getApiMethodName()
    {
        return "taobao.wangwang.eservice.evals.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->endDate, "endDate");
        RequestCheckUtil::checkNotNull($this->serviceStaffId, "serviceStaffId");
        RequestCheckUtil::checkMaxListSize($this->serviceStaffId, 30, "serviceStaffId");
        RequestCheckUtil::checkNotNull($this->startDate, "startDate");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
