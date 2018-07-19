<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: cainiao.cloudprint.crashinfos.put request
 *
 * @author auto create
 * @since  1.0, 2016.05.31
 */
class CainiaoCloudprintCrashinfosPutRequest implements RequestInterface
{
    /**
     * 入参
     **/
    private $crashInfo;

    private $apiParas = [ ];

    public function setCrashInfo($crashInfo)
    {
        $this->crashInfo = $crashInfo;
        $this->apiParas["crash_info"] = $crashInfo;
    }

    public function getCrashInfo()
    {
        return $this->crashInfo;
    }

    public function getApiMethodName()
    {
        return "cainiao.cloudprint.crashinfos.put";
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
