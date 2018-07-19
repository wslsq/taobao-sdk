<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wangwang.eservice.groupmember.get request
 *
 * @author auto create
 * @since  1.0, 2014.03.18
 */
class WangwangEserviceGroupmemberGetRequest implements RequestInterface
{
    /**
     * 主帐号ID：cntaobao+淘宝nick，例如cntaobaotest
     **/
    private $managerId;

    private $apiParas = [ ];

    public function setManagerId($managerId)
    {
        $this->managerId = $managerId;
        $this->apiParas["manager_id"] = $managerId;
    }

    public function getManagerId()
    {
        return $this->managerId;
    }

    public function getApiMethodName()
    {
        return "taobao.wangwang.eservice.groupmember.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->managerId, "managerId");
        RequestCheckUtil::checkMaxLength($this->managerId, 128, "managerId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
