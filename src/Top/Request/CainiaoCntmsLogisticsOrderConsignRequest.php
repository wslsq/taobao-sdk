<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: cainiao.cntms.logistics.order.consign request
 *
 * @author auto create
 * @since  1.0, 2015.09.11
 */
class CainiaoCntmsLogisticsOrderConsignRequest implements RequestInterface
{
    /**
     * 配送发货信息
     **/
    private $content;

    private $apiParas = [ ];

    public function setContent($content)
    {
        $this->content = $content;
        $this->apiParas["content"] = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getApiMethodName()
    {
        return "cainiao.cntms.logistics.order.consign";
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
