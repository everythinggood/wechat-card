<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午6:47
 */
require __DIR__.'/../../vendor/autoload.php';
$client = new \wechat\Client();
$response = $client->http_get("https://api.oppein.cn/wechat/accesstoken/getaccesstoken/wx63b69c06d249955a");
$access_token = json_decode($response,true)['access_token'];
var_dump($access_token);

$client->setDomain('https://api.weixin.qq.com');
$request = new \wechat\request\CardGetRequest();
$request->access_token = $access_token;
$request->setCardId("pjf3estmh5-0XjDBnTUgKO0cGBqU");
$response = new \wechat\response\CardGetResponse();
/** @var \wechat\response\CardGetResponse $response */
$response = $client->execute($request,$response);
//var_dump($response);
/**
 *  "custom_app_brand_user_name": "gh_86a091e50ad4@app",
"custom_app_brand_pass":"API/cardPage",
"custom_url_sub_title": "6个汉字tips",
"promotion_url_name": "更多优惠",
"promotion_url": "http://www.qq.com",
"promotion_app_brand_user_name": "gh_86a091e50ad4@app",
"promotion_app_brand_pass":"API/cardPage"
 *
 */
$type = strtolower($response->card['card_type']);
//$base_info = $response->card[$type]['base_info'];
$base_info['custom_app_brand_user_name'] = 'gh_5f3a8d33fc06@app';
$base_info['custom_app_brand_pass'] = 'pages/index/index';
$base_info['custom_url_sub_title'] = 'mapp';
$base_info['promotion_url_name'] = '更多优惠';
$base_info['promotion_url'] = 'http://www.qq.com';
$base_info['promotion_app_brand_user_name'] = 'gh_5f3a8d33fc06@app';
$base_info['promotion_app_brand_pass'] = 'pages/index/index';
$response->card[$type]['base_info'] = $base_info;

var_dump(json_encode($base_info));
