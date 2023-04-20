<?php


namespace Ajian\Miniprogram\Api;

use GuzzleHttp\Client;

/**
 * 查询scheme码
 * @package Ajian\Miniprogram\Api
 */
class QueryScheme extends BaseApi
{
    private $access_token;
    private $scheme;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/wxa/queryscheme";
        $client = new Client();
        $response = $client->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => [
                'scheme' => $this->scheme
            ]
        ]);
        return new \Ajian\Miniprogram\Response\QueryScheme($response);
    }

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['scheme'])){
            $this->scheme = $params['scheme'];
        }
    }
}