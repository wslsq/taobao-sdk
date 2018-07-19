<?php
namespace Flofire\TaobaoSDK\Top;

use Flofire\TaobaoSDK\Exception\TaoBaoSDKException;
use Flofire\TaobaoSDK\Config\Config;

class TopClient
{
    /** @var string App Key */
    public $appKey;

    /** @var string App Secret */
    public $appSecret;

    /** @var int 连接超时 秒 */
    public $connectTimeout = 0;

    /** @var int 读取超时 */
    public $readTimeout = 0;

    /** @var bool 是否打开入参check */
    public $checkRequest = true;

    /** @var string 请求内容返回格式 */
    public $format = 'json';

    /** @var string 签名生成方式 */
    protected $signMethod = "md5";

    /** @var Config */
    protected $config;

    /** API 版本 */
    const API_VERSION = '2.0';
    /** SDK 版本 */
    const SDK_VERSION = "taobao-sdk-PHP-20160609";

    /** Api 入口地址 */
    const GATEWAY_URL = "https://eco.taobao.com/router/rest";
    const SANDBOX_GATEWAY_URL = "https://gw.api.tbsandbox.com/router/rest";


    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->appKey = $this->config->appKey;
        $this->appSecret = $this->config->appSecret;
    }

    protected function generateSign($params)
    {
        ksort($params);

        $stringToBeSigned = $this->appSecret;
        foreach ($params as $k => $v) {
            if ((is_numeric($v) || is_string($v)) && "@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $this->appSecret;

        return strtoupper(md5($stringToBeSigned));
    }

    public function curl($url, $postFields = null)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($this->readTimeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
        }
        if ($this->connectTimeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        }
        curl_setopt($ch, CURLOPT_USERAGENT, "top-sdk-php");

        //https 请求
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        if (is_array($postFields) && 0 < count($postFields)) {
            $postBodyString = "";
            $postMultipart = false;
            foreach ($postFields as $k => $v) {
                if (!is_string($v) && !is_numeric($v)) {
                    continue;
                }

                //判断是不是文件上传
                if ("@" != substr($v, 0, 1)) {
                    $postBodyString .= "$k=" . urlencode($v) . "&";
                } else { //文件上传用multipart/form-data，否则用www-form-urlencoded
                    $postMultipart = true;
                    if (class_exists('\CURLFile')) {
                        $postFields[ $k ] = new \CURLFile(substr($v, 1));
                    }
                }
            }
            unset($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($postMultipart) {
                if (class_exists('\CURLFile')) {
                    curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
                } else {
                    if (defined('CURLOPT_SAFE_UPLOAD')) {
                        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
                    }
                }
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            } else {
                $header = [ "content-type: application/x-www-form-urlencoded; charset=UTF-8" ];
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

                curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
            }
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new TaoBaoSDKException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new TaoBaoSDKException($response, $httpStatusCode);
            }
        }
        curl_close($ch);
		
        return $response;
    }

    public function curl_with_memory_file($url, $postFields = null, $fileFields = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($this->readTimeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
        }
        if ($this->connectTimeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        }
        curl_setopt($ch, CURLOPT_USERAGENT, "top-sdk-php");
        //https 请求
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        //生成分隔符
        $delimiter = '-------------' . uniqid();
        //先将post的普通数据生成主体字符串
        $data = '';
        if ($postFields != null) {
            foreach ($postFields as $name => $content) {
                $data .= "--" . $delimiter . "\r\n";
                $data .= 'Content-Disposition: form-data; name="' . $name . '"';
                //multipart/form-data 不需要urlencode，参见 http:stackoverflow.com/questions/6603928/should-i-url-encode-post-data
                $data .= "\r\n\r\n" . $content . "\r\n";
            }
            unset($name, $content);
        }

        //将上传的文件生成主体字符串
        if ($fileFields != null) {
            foreach ($fileFields as $name => $file) {
                $data .= "--" . $delimiter . "\r\n";
                $data .= 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $file['name'] . "\" \r\n";
                $data .= 'Content-Type: ' . $file['type'] . "\r\n\r\n";//多了个文档类型

                $data .= $file['content'] . "\r\n";
            }
            unset($name, $file);
        }
        //主体结束的分隔符
        $data .= "--" . $delimiter . "--";

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: multipart/form-data; boundary=' . $delimiter,
            'Content-Length: ' . strlen($data),
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        unset($data);

        if (curl_errno($ch)) {
            throw new TaoBaoSDKException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new TaoBaoSDKException($response, $httpStatusCode);
            }
        }
        curl_close($ch);

        return $response;
    }

    protected function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt)
    {
        $localIp = isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : "CLI";
        $logger = new TopLogger;
        $logger->conf['log_file'] = rtrim(TOP_SDK_WORK_DIR, '\\/') . '/' . "logs/top_comm_err_" . $this->appKey . "_" . date("Y-m-d") . ".log";
        $logger->conf['separator'] = "^_^";
        $logData = [
            date("Y-m-d H:i:s"),
            $apiName,
            $this->appKey,
            $localIp,
            PHP_OS,
            self::SDK_VERSION,
            $requestUrl,
            $errorCode,
            str_replace("\n", "", $responseTxt),
        ];
        $logger->log($logData);
    }

    public function execute(RequestInterface $request, $session = null, $bestUrl = null)
    {
        $result = new ResultSet();
        if ($this->checkRequest) {
            try {
                $request->check();
            } catch (TaoBaoSDKException $e) {

                $result->code = $e->getCode();
                $result->msg = $e->getMessage();

                return $result;
            }
        }
        //组装系统参数
        $sysParams["app_key"] = $this->appKey;
        $sysParams["v"] = self::API_VERSION;
        $sysParams["format"] = $this->format;
        $sysParams["sign_method"] = $this->signMethod;
        $sysParams["method"] = $request->getApiMethodName();
        $sysParams["timestamp"] = date("Y-m-d H:i:s");

        if (null != $session) {
            $sysParams["session"] = $session;
        }

        $apiParams = [ ];

        //获取业务参数
        $apiParams = $request->getApiParas();

        //系统参数放入GET请求串
        if ($bestUrl) {
            $requestUrl = $bestUrl . "?";
            $sysParams["partner_id"] = $this->getClusterTag();
        } else {
            $requestUrl = self::GATEWAY_URL . "?";
            $sysParams["partner_id"] = self::SDK_VERSION;
        }

        //签名
        $sysParams["sign"] = $this->generateSign(array_merge($apiParams, $sysParams));

        foreach ($sysParams as $sysParamKey => $sysParamValue) {
            // if(strcmp($sysParamKey,"timestamp") != 0)
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }

        $fileFields = [ ];
        foreach ($apiParams as $key => $value) {
            if (is_array($value) && array_key_exists('type', $value) && array_key_exists('content', $value)) {
                $value['name'] = $key;
                $fileFields[ $key ] = $value;
                unset($apiParams[ $key ]);
            }
        }

        // $requestUrl .= "timestamp=" . urlencode($sysParams["timestamp"]) . "&";
        $requestUrl = substr($requestUrl, 0, -1);

        //发起HTTP请求
        try {
            if (count($fileFields) > 0) {
                $resp = $this->curl_with_memory_file($requestUrl, $apiParams, $fileFields);
            } else {
                $resp = $this->curl($requestUrl, $apiParams);
            }
        } catch (TaoBaoSDKException $e) {
            $this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_ERROR_" . $e->getCode(), $e->getMessage());
            $result->code = $e->getCode();
            $result->msg = $e->getMessage();

            return $result;
        }

        unset($apiParams);
        unset($fileFields);

        //解析TOP返回结果
        $respWellFormed = false;
        $respObject = '';
        if ("json" == $this->format) {
            $respObject = json_decode($resp);
            if (null !== $respObject) {
                $respWellFormed = true;
                foreach ($respObject as $propKey => $propValue) {
                    $respObject = $propValue;
                }
            }
        } else if ("xml" == $this->format) {
            $respObject = @simplexml_load_string($resp);
            if (false !== $respObject) {
                $respWellFormed = true;
            }
        }

        //返回的HTTP文本不是标准JSON或者XML，记下错误日志
        if (false === $respWellFormed) {
            $this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_RESPONSE_NOT_WELL_FORMED", $resp);
            $result->code = 0;
            $result->msg = "HTTP_RESPONSE_NOT_WELL_FORMED";

            return $result;
        }

        //如果TOP返回了错误码，记录到业务错误日志中
        if (isset($respObject->code)) {
            $logger = new TopLogger;
            $logger->conf["log_file"] = $this->config->getLogFilePath();
            $logger->log([ date("Y-m-d H:i:s"), $resp ]);
        }

        return $respObject;
    }

    /*
    public function exec($paramsArray)
    {
        if (!isset($paramsArray["method"])) {
            trigger_error("No api name passed");
        }
        $inflector = new LtInflector;
        $inflector->conf["separator"] = ".";
        $requestClassName = ucfirst($inflector->camelize(substr($paramsArray["method"], 7))) . "Request";
        if (!class_exists($requestClassName)) {
            trigger_error("No such api: " . $paramsArray["method"]);
        }

        $session = isset($paramsArray["session"]) ? $paramsArray["session"] : null;

        $req = new $requestClassName;
        foreach ($paramsArray as $paraKey => $paraValue) {
            $inflector->conf["separator"] = "_";
            $setterMethodName = $inflector->camelize($paraKey);
            $inflector->conf["separator"] = ".";
            $setterMethodName = "set" . $inflector->camelize($setterMethodName);
            if (method_exists($req, $setterMethodName)) {
                $req->$setterMethodName($paraValue);
            }
        }

        return $this->execute($req, $session);
    }

    */
    private function getClusterTag()
    {
        return substr(self::SDK_VERSION, 0, 11) . "-cluster" . substr(self::SDK_VERSION, 11);
    }
}
