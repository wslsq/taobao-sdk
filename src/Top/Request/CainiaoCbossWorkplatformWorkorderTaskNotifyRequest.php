<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: cainiao.cboss.workplatform.workorder.task.notify request
 *
 * @author auto create
 * @since  1.0, 2016.06.08
 */
class CainiaoCbossWorkplatformWorkorderTaskNotifyRequest implements RequestInterface
{
    /**
     * content
     **/
    private $content;

    private $apiParas = [ ];

    public function setContent($content)
    {
        $this->content = $content;
        $this->apiParas["content"] = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getApiMethodName()
    {
        return "cainiao.cboss.workplatform.workorder.task.notify";
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
