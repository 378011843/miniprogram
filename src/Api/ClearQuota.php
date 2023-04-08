<?php


namespace Ajian\Miniprogram\Api;


use GuzzleHttp\Client;

class ClearQuota extends BaseApi
{
    private $access_token;
    private $appid;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/cgi-bin/clear_quota";
        $client = new Client();
        $response = $client->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => [
                'appid' => $this->appid
            ]
        ]);
        return new \Ajian\Miniprogram\Response\ClearQuota($response);
    }

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['appid'])){
            $this->appid = $params['appid'];
        }
    }
}