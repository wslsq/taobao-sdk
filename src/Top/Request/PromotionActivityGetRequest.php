<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.promotion.activity.get request
 *
 * @author auto create
 * @since  1.0, 2016.03.17
 */
class PromotionActivityGetRequest implements RequestInterface
{
    /**
     * 活动的id
     **/
    private $activityId;

    private $apiParas = [ ];

    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
        $this->apiParas["activity_id"] = $activityId;
    }

    public function getActivityId()
    {
        return $this->activityId;
    }

    public function getApiMethodName()
    {
        return "taobao.promotion.activity.get";
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
