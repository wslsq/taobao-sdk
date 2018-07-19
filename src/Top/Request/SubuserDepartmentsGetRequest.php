<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.subuser.departments.get request
 *
 * @author auto create
 * @since  1.0, 2016.03.17
 */
class SubuserDepartmentsGetRequest implements RequestInterface
{
    /**
     * 主账号用户名
     **/
    private $userNick;

    private $apiParas = [ ];

    public function setUserNick($userNick)
    {
        $this->userNick = $userNick;
        $this->apiParas["user_nick"] = $userNick;
    }

    public function getUserNick()
    {
        return $this->userNick;
    }

    public function getApiMethodName()
    {
        return "taobao.subuser.departments.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->userNick, "userNick");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
