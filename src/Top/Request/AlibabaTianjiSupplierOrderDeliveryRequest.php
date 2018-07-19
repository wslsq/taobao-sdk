<?php
namespace Flofire\TaobaoSDK\Top\Request;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: alibaba.tianji.supplier.order.delivery request
 *
 * @author auto create
 * @since  1.0, 2016.03.21
 */
class AlibabaTianjiSupplierOrderDeliveryRequest implements RequestInterface
{
    /**
     * 物流信息
     **/
    private $paramDistributionOrderLogisticsModel;

    private $apiParas = [ ];

    public function setParamDistributionOrderLogisticsModel($paramDistributionOrderLogisticsModel)
    {
        $this->paramDistributionOrderLogisticsModel = $paramDistributionOrderLogisticsModel;
        $this->apiParas["param_distribution_order_logistics_model"] = $paramDistributionOrderLogisticsModel;
    }

    public function getParamDistributionOrderLogisticsModel()
    {
        return $this->paramDistributionOrderLogisticsModel;
    }

    public function getApiMethodName()
    {
        return "alibaba.tianji.supplier.order.delivery";
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
