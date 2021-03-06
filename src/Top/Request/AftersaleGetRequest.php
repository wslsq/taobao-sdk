<?php
namespace Flofire\TaobaoSDK\Top\Request;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.aftersale.get request
 * 
 * @author auto create
 * @since 1.0, 2016.03.10
 */
class AftersaleGetRequest implements RequestInterface
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.aftersale.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
