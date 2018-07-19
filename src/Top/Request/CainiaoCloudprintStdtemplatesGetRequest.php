<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: cainiao.cloudprint.stdtemplates.get request
 *
 * @author auto create
 * @since  1.0, 2016.05.19
 */
class CainiaoCloudprintStdtemplatesGetRequest implements RequestInterface
{

    private $apiParas = [ ];

    public function getApiMethodName()
    {
        return "cainiao.cloudprint.stdtemplates.get";
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
