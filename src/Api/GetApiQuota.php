<?php


namespace Ajian\Miniprogram\Api;


use GuzzleHttp\Client;

/**
 * 查询API调用额度
 * @package Ajian\Miniprogram\Api
 */
class GetApiQuota extends \Ajian\Miniprogram\Api\BaseApi
{
    private $access_token;
    private $cgi_path;

    /**
     * @inheritDoc
     */
    function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['cgi_path'])){
            $this->cgi_path = $params['cgi_path'];
        }
    }

    /**
     * @inheritDoc
     */
    public function request()
    {
        $uri = "https://api.weixin.qq.com/cgi-bin/openapi/quota/get";
        $client = new Client();
        $response = $client->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => [
                'cgi_path' => $this->cgi_path
            ]
        ]);
        return new \Ajian\Miniprogram\Response\GetApiQuota($response);
    }
}