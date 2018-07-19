<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: alipay.xiaodai.user.permit request
 *
 * @author auto create
 * @since  1.0, 2015.04.17
 */
class AlipayXiaodaiUserPermitRequest implements RequestInterface
{
    /**
     * 用户数字ID
     **/
    private $userId;

    private $apiParas = [ ];

    public function setUserId($userId)
    {
        $this->userId = $userId;
        $this->apiParas["user_id"] = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getApiMethodName()
    {
        return "alipay.xiaodai.user.permit";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->userId, "userId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
