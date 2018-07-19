<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.logistics.online.cancel request
 *
 * @author auto create
 * @since  1.0, 2015.11.04
 */
class LogisticsOnlineCancelRequest implements RequestInterface
{
    /**
     * 淘宝交易ID
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
        return "taobao.logistics.online.cancel";
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
