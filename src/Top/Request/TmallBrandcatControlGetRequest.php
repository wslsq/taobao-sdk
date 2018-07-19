<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: tmall.brandcat.control.get request
 *
 * @author auto create
 * @since  1.0, 2016.03.17
 */
class TmallBrandcatControlGetRequest implements RequestInterface
{

    private $apiParas = [ ];

    public function getApiMethodName()
    {
        return "tmall.brandcat.control.get";
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
