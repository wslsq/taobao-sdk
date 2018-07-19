<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: alibaba.wtt.order.contract.subscribe request
 *
 * @author auto create
 * @since  1.0, 2015.12.08
 */
class AlibabaWttOrderContractSubscribeRequest implements RequestInterface
{
    /**
     * 分销商合约生产
     **/
    private $distributionOrderModel;

    private $apiParas = [ ];

    public function setDistributionOrderModel($distributionOrderModel)
    {
        $this->distributionOrderModel = $distributionOrderModel;
        $this->apiParas["distribution_order_model"] = $distributionOrderModel;
    }

    public function getDistributionOrderModel()
    {
        return $this->distributionOrderModel;
    }

    public function getApiMethodName()
    {
        return "alibaba.wtt.order.contract.subscribe";
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
