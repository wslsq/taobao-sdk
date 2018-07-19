<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: cainiao.bim.tradeorder.consign request
 *
 * @author auto create
 * @since  1.0, 2016.03.01
 */
class CainiaoBimTradeorderConsignRequest implements RequestInterface
{
    /**
     * 仓储编码，ERP指定仓库发货时需要传值，编码由菜鸟提供
     **/
    private $storeCode;

    /**
     * 交易单号
     **/
    private $tradeId;

    private $apiParas = [ ];

    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
        $this->apiParas["store_code"] = $storeCode;
    }

    public function getStoreCode()
    {
        return $this->storeCode;
    }

    public function setTradeId($tradeId)
    {
        $this->tradeId = $tradeId;
        $this->apiParas["trade_id"] = $tradeId;
    }

    public function getTradeId()
    {
        return $this->tradeId;
    }

    public function getApiMethodName()
    {
        return "cainiao.bim.tradeorder.consign";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->tradeId, "tradeId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
