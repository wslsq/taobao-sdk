<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wlb.tmsorder.query request
 *
 * @author auto create
 * @since  1.0, 2016.04.13
 */
class WlbTmsorderQueryRequest implements RequestInterface
{
    /**
     * 物流订单编号
     **/
    private $orderCode;

    /**
     * 当前页
     **/
    private $pageNo;

    /**
     * 分页记录个数，如果用户输入的记录数大于50，则一页显示50条记录
     **/
    private $pageSize;

    private $apiParas = [ ];

    public function setOrderCode($orderCode)
    {
        $this->orderCode = $orderCode;
        $this->apiParas["order_code"] = $orderCode;
    }

    public function getOrderCode()
    {
        return $this->orderCode;
    }

    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
        $this->apiParas["page_no"] = $pageNo;
    }

    public function getPageNo()
    {
        return $this->pageNo;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        $this->apiParas["page_size"] = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function getApiMethodName()
    {
        return "taobao.wlb.tmsorder.query";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->orderCode, "orderCode");
        RequestCheckUtil::checkMaxLength($this->orderCode, 64, "orderCode");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
