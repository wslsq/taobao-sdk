<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.sellercenter.roles.get request
 *
 * @author auto create
 * @since  1.0, 2016.03.05
 */
class SellercenterRolesGetRequest implements RequestInterface
{
    /**
     * 卖家昵称(只允许查询自己的信息：当前登陆者)
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
        return "taobao.sellercenter.roles.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->nick, "nick");
        RequestCheckUtil::checkMaxLength($this->nick, 500, "nick");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
