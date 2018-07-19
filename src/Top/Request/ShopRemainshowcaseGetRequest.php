<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.shop.remainshowcase.get request
 *
 * @author auto create
 * @since  1.0, 2015.01.19
 */
class ShopRemainshowcaseGetRequest implements RequestInterface
{

    private $apiParas = [ ];

    public function getApiMethodName()
    {
        return "taobao.shop.remainshowcase.get";
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
