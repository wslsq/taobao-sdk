<?php
namespace Flofire\TaobaoSDK\Config;


use Flofire\TaobaoSDK\Exception\TaoBaoSDKException;

class Config
{
    /** @var bool 沙箱模式 */
    public $sandbox = false;

    /** @var string 正式环境 */
    public $appKey;
    public $appSecret;

    /** @var string 沙箱环境 */
    public $sandboxAppKey;
    public $sandboxAppSecret;

    /** 获取 code 后回调地址 */
    public $authCodeRedirectURL;

    /** 获取 token 后地址 */
    public $authTokenRedirectURL;

    /** @var string 日志目录 */
    public $logsDir = 'Logs';
    public $sdkWorkDir;

    /**
     * Config constructor.
     *
     * @param string $appKey
     */
    public function __construct($option = [ ])
    {

        if (!isset($option['appKey']) || !isset($option['appSecret'])) {
            throw new TaoBaoSDKException('appKey 或者 appSecret 未定义');
        }

        $this->appKey = $option['appKey'];
        $this->appSecret = $option['appSecret'];

        if (isset($option['authCodeRedirectURL'])) {
            $this->authCodeRedirectURL = $option['authCodeRedirectURL'];
        }

        if (isset($option['authTokenRedirectURL'])) {
            $this->authTokenRedirectURL = $option['authTokenRedirectURL'];
        }
    }


    /**
     * 获取 SDK 工作目录
     */
    public function getSDKWorkDir()
    {
        $this->sdkWorkDir = dirname(__DIR__);

        return $this->sdkWorkDir;
    }

    /**
     * 获取 Log 目录
     */
    public function getLogsDir()
    {
        return self::getSDKWorkDir() . DIRECTORY_SEPARATOR . $this->logsDir . DIRECTORY_SEPARATOR;
    }

    /**
     * 获取当日 log 文件路径
     */
    public function getLogFilePath($type = 'log')
    {
        return self::getLogsDir() . 'tb_sdk_' . $type . '_' . $this->appKey . '_' . date('Y-m-d') . '.log';
    }
}