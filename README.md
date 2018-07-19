taobao-sdk for php
==================
>[基于lonquan/taobao-sdk修改修复bug](https://github.com/lonquan/taobao-sdk)

>基于官方 SDK 修改而来, 增加命名空间, 获取授权等
## 安装

使用 Composer 安装:

```
composer require flofire/taobao-sdk
```

## 使用

### config
```
$option = [
    'appKey'               => '',
    'appSecret'            => '',
    'authCodeRedirectURL'  => '获取授权码后回调地址',
    'authTokenRedirectURL' => '获取 Token 后回调地址',
];

$config = new \Flofire\TaobaoSDK\Config\Config($option);
```

### 获取 Code
```
$auth = new \Flofire\TaobaoSDK\Auth($config);
echo $auth->loginAuth();
```

### 获取 Token
```
$session = $auth->loginAuthCallBackHandler($code);
```

>[授权流程官方文档](http://open.taobao.com/doc2/detail.htm?spm=a219a.7629140.0.0.mnnCfp&treeId=1&articleId=102635&docType=1)

### 获取订单
```
$topC = new Flofire\TaobaoSDK\Top\TopClient($config);
$req = new \Flofire\TaobaoSDK\Top\Request\TradeFullInfoGetRequest();
$req->setFields("tid,type,status,payment,orders");
$req->setTid("orderId");
$resp = $topC->execute($req, $sessionKey);
```

### 获取出售中的商品
```
$top = new \Flofire\TaobaoSDK\Top\TopClient($config);

$req = new \Flofire\TaobaoSDK\Top\Request\ItemsOnSaleGetRequest();
$req->setFields('num_iid,title,price');
$req->setQ('500W');
// $req->setCid("1512");
// $req->setSellerCids("11");
$req->setPageNo("1");
// $req->setHasDiscount('true');
// $req->setHasShowcase('true');
// 排序方式
$req->setOrderBy('list_time:desc');
// 商品是否在淘宝显示
// $req->setIsTaobao("true");
// 商品是否在外部网店显示
// $req->setIsEx('true');
$req->setPageSize('100');
$resp = $top->execute($req, $sessionKey);
```


>更多 API 方法, 请参考[官方 API 列表](http://open.taobao.com/doc2/api_list.htm), 该 SDK 对官方提供的 SDK 文件增加了命名空间, 所以使用方法跟官方提供的请求示例中的方法完全一样.