<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.top.ipout.get request
 *
 * @author auto create
 * @since  1.0, 2015.09.07
 */
class TopIpoutGetRequest implements RequestInterface
{

    private $apiParas = [ ];

    public function getApiMethodName()
    {
        return "taobao.top.ipout.get";
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
