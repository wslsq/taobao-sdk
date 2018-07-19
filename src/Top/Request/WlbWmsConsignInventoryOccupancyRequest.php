<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wlb.wms.consign.inventory.occupancy request
 *
 * @author auto create
 * @since  1.0, 2016.05.25
 */
class WlbWmsConsignInventoryOccupancyRequest implements RequestInterface
{
    /**
     * 库存占用
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
        return "taobao.wlb.wms.consign.inventory.occupancy";
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
