<?php


namespace Ajian\Miniprogram\Api;


use GuzzleHttp\Client;

class QueryUrlLink extends BaseApi
{
    private $access_token;
    private $url_link;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/wxa/query_urllink";
        $client = new Client();
        $response = $client->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => [
                'url_link' => $this->url_link
            ]
        ]);
        return new \Ajian\Miniprogram\Response\QueryUrlLink($response);
    }

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['url_link'])){
            $this->url_link = $params['url_link'];
        }
    }
}