<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.sellercenter.role.info.get request
 *
 * @author auto create
 * @since  1.0, 2016.03.05
 */
class SellercenterRoleInfoGetRequest implements RequestInterface
{
    /**
     * 角色id
     **/
    private $roleId;

    private $apiParas = [ ];

    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        $this->apiParas["role_id"] = $roleId;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function getApiMethodName()
    {
        return "taobao.sellercenter.role.info.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->roleId, "roleId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
