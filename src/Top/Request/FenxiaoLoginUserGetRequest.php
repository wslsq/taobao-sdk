<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.fenxiao.login.user.get request
 *
 * @author auto create
 * @since  1.0, 2016.04.11
 */
class FenxiaoLoginUserGetRequest implements RequestInterface
{

    private $apiParas = [ ];

    public function getApiMethodName()
    {
        return "taobao.fenxiao.login.user.get";
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
