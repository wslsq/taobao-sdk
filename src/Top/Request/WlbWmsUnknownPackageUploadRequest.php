<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.wlb.wms.unknown.package.upload request
 *
 * @author auto create
 * @since  1.0, 2016.05.25
 */
class WlbWmsUnknownPackageUploadRequest implements RequestInterface
{
    /**
     * null
     **/
    private $request;

    private $apiParas = [ ];

    public function setRequest($request)
    {
        $this->request = $request;
        $this->apiParas["request"] = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getApiMethodName()
    {
        return "taobao.wlb.wms.unknown.package.upload";
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
