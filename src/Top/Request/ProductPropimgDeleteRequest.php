<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.product.propimg.delete request
 *
 * @author auto create
 * @since  1.0, 2016.03.05
 */
class ProductPropimgDeleteRequest implements RequestInterface
{
    /**
     * 属性图片ID
     **/
    private $id;

    /**
     * 产品ID.Product的id.
     **/
    private $productId;

    private $apiParas = [ ];

    public function setId($id)
    {
        $this->id = $id;
        $this->apiParas["id"] = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        $this->apiParas["product_id"] = $productId;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getApiMethodName()
    {
        return "taobao.product.propimg.delete";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull($this->id, "id");
        RequestCheckUtil::checkNotNull($this->productId, "productId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
