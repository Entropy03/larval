<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers','middleware' => 'cors.after'], function ($api) {
        $api->get('user/me', 'AuthController@getAuthenticatedUser'); //根据

        $api->post('user/login', 'AuthController@authenticate');    //登录授权
        $api->get('user/register', 'AuthController@register');     //用户注册
        $api->get('tests', 'TestsController@index');
        $api->get('cate', 'CategoryController@getCategory'); //获取分类
        $api->get('products', 'ProductsController@getProducts'); //获取商品列表
        $api->get('products/{id}', 'ProductsController@getProductInfo');//获取商品详情
        $api->get('phone/code', 'ValidateControllers@sendPhoneCode');//获取商品详情
        $api->get('wx/sign', 'WxLocController@getSign');//获取微信签名
        $api->get('loc', 'RegisterController@getfcarsByXY'); //根据 经纬度获保鲜车



        $api->get('wxtoken', 'WxAtouController@getAccess_token'); //根据 经纬度获保鲜车

        $api->group(['middleware' => 'jwt.auth'], function ($api) {
            //请求方式：
            $api->get('tests/{id}', 'TestsController@show');

        });
    });
});
