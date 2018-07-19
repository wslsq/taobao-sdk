<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.fenxiao.productcats.get request
 *
 * @author auto create
 * @since  1.0, 2016.04.06
 */
class FenxiaoProductcatsGetRequest implements RequestInterface
{
    /**
     * 返回字段列表
     **/
    private $fields;

    private $apiParas = [ ];

    public function setFields($fields)
    {
        $this->fields = $fields;
        $this->apiParas["fields"] = $fields;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getApiMethodName()
    {
        return "taobao.fenxiao.productcats.get";
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
