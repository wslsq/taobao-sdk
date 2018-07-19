<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.trade.confirmfee.get request
 *
 * @author auto create
 * @since  1.0, 2015.04.14
 */
class TradeConfirmfeeGetRequest implements RequestInterface
{
    /**
     * 交易主订单或子订单ID
     **/
    private $tid;

    private $apiParas = [ ];

    public function setTid($tid)
    {
        $this->tid = $tid;
        $this->apiParas["tid"] = $tid;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function getApiMethodName()
    {
        return "taobao.trade.confirmfee.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->tid, "tid");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
