<?php
namespace Flofire\TaobaoSDK\Top\Request;
use Flofire\TaobaoSDK\Top\RequestInterface;

/**
 * TOP API: taobao.appip.get request
 * 
 * @author auto create
 * @since 1.0, 2014.11.26
 */
class AppipGetRequest implements RequestInterface
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.appip.get";
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
