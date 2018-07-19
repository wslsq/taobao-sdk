<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.sellercenter.subuser.permissions.roles.get request
 *
 * @author auto create
 * @since  1.0, 2016.04.11
 */
class SellercenterSubuserPermissionsRolesGetRequest implements RequestInterface
{
    /**
     * 子账号昵称(子账号标识)
     **/
    private $nick;

    private $apiParas = [ ];

    public function setNick($nick)
    {
        $this->nick = $nick;
        $this->apiParas["nick"] = $nick;
    }

    public function getNick()
    {
        return $this->nick;
    }

    public function getApiMethodName()
    {
        return "taobao.sellercenter.subuser.permissions.roles.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->nick, "nick");
        RequestCheckUtil::checkMaxLength($this->nick, 100, "nick");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
