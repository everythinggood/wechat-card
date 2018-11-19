<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-19
 * Time: 上午12:18
 */

/**
cardExt
:
"{"code": "", "openid": "","nonce_str": "8jnekmvsmjnkiv9j", "timestamp": "1542615429", "signature":"b622511da8eaaa776360885dca898f3c82c05d68"}"
cardId
:
"pjf3esnsHjIZOhxQZ-t69noSTx2o"
code
:
"EaZ6p7gWOwQ3XaMOC0CEmL8+DFh8TXOYqUiurkYVIcI="
 *
 */
require __DIR__.'/../../vendor/autoload.php';
$client = new \wechat\Client();
$response = $client->http_get("https://api.oppein.cn/wechat/accesstoken/getaccesstoken/wx63b69c06d249955a");
$access_token = json_decode($response,true)['access_token'];
var_dump($access_token);

$client->setDomain('https://api.weixin.qq.com');
$request = new \wechat\request\CardCodeDecryptRequest();
$request->access_token = $access_token;
$request->setEncryptCode("EaZ6p7gWOwQ3XaMOC0CEmL8+DFh8TXOYqUiurkYVIcI=");
$response = new \wechat\response\CardCodeDecryptResponse();
/** @var \wechat\response\CardCodeDecryptResponse $response */
$response = $client->execute($request,$response);
var_export($response);