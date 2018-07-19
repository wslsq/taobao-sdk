<?php
namespace Flofire\TaobaoSDK\Top\Request;

use Flofire\TaobaoSDK\Top\RequestCheckUtil;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: tmall.item.sizemapping.template.get request
 *
 * @author auto create
 * @since  1.0, 2016.02.23
 */
class TmallItemSizemappingTemplateGetRequest implements RequestInterface
{
    /**
     * 尺码表模板ID
     **/
    private $templateId;

    private $apiParas = [ ];

    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        $this->apiParas["template_id"] = $templateId;
    }

    public function getTemplateId()
    {
        return $this->templateId;
    }

    public function getApiMethodName()
    {
        return "tmall.item.sizemapping.template.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {
        RequestCheckUtil::checkNotNull($this->templateId, "templateId");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[ $key ] = $value;
        $this->$key = $value;
    }
}
