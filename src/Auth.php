<?php
namespace Flofire\TaobaoSDK;

use Flofire\TaobaoSDK\Exception\TaoBaoSDKException;
use Flofire\TaobaoSDK\Config\Config;

/**
 * Server-side flow 淘宝登录授权
 * Server-side flow 授权方式流程
 * 1. 拼接授权url
 * 2. 引导用户登录授权
 * 3. 获取code
 * 4. 换取access_token
 * 详细说明地址 http://open.taobao.com/doc2/detail.htm?spm=a219a.7629140.0.0.Grxp8g&treeId=49&articleId=102635&docType=1
 *
 * @package Flofire\TaobaoSDK
 */
class Auth
{
    /** 请求入口地址 */
    /** 获取授权码 */
    const authorizationCodeURL = 'https://oauth.taobao.com/authorize';
    /** 获取访问令牌 */
    const accessTokenURL = 'https://oauth.taobao.com/token';

    /** @var array 登录授权需要 get 参数 */
    public $loginAuthParam = [
        'client_id'     => '',
        'response_type' => 'code',
        'redirect_uri'  => '',
        'state'         => '',
        'view'          => 'web',
    ];

    /** @var array 获取 access token 需要的参数 */
    public $accessTokenParam = [
        'client_id'     => '',
        'client_secret' => '',
        'grant_type'    => 'authorization_code',
        'code'          => '',
        'redirect_uri'  => '',
        'state'         => '',
        'view'          => 'web',
    ];

    /**
     * Auth constructor.
     */
    public function __construct(Config $config)
    {
        $this->loginAuthParam['client_id'] = $config->appKey;
        $this->loginAuthParam['redirect_uri'] = $config->authCodeRedirectURL;

        // 回调会将 state 原样返回, 设置为 APP KEY, 方便区分应用?
        $this->loginAuthParam['state'] = $config->appKey;
        $this->accessTokenParam['state'] = $config->appKey;

        $this->accessTokenParam['client_id'] = $config->appKey;
        $this->accessTokenParam['client_secret'] = $config->appSecret;
        $this->accessTokenParam['redirect_uri'] = $config->authTokenRedirectURL;
    }

    /**
     * 获取登录授权码地址
     *
     * @return string
     */
    public function loginAuth()
    {
        return self::authorizationCodeURL . '?' . http_build_query($this->loginAuthParam);
    }

    /**
     * 获取授权码, 回调处理程序
     *
     * @param $code
     * @param $state
     */
    public function loginAuthCallBackHandler($code)
    {
        $this->accessTokenParam['code'] = $code;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::accessTokenURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        //指定post数据
        curl_setopt($ch, CURLOPT_POST, true);

        //添加变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->accessTokenParam));

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
}