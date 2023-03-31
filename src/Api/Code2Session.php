<?php
namespace Ajian\Miniprogram\Api;

use GuzzleHttp\Client;
class Code2Session extends BaseApi
{
    private $appid;
    private $secret;
    private $js_code;
    private $grant_type = 'authorization_code';

    public function __construct($params)
    {
        if(isset($params['appid'])){
            $this->appid = $params['appid'];
        }
        if(isset($params['secret'])){
            $this->secret = $params['secret'];
        }
        if(isset($params['js_code'])){
            $this->js_code = $params['js_code'];
        }
    }

    public function request()
    {
        $client = new Client();
        $uri = "https://api.weixin.qq.com/sns/jscode2session";
        $response = $client->request('GET',$uri,[
            'query' => [
                'appid' => $this->appid,
                'secret' => $this->secret,
                'js_code' => $this->js_code,
                'grant_type' => $this->grant_type
            ]
        ]);
        return new \Ajian\Miniprogram\Response\Code2Session($response);
    }

    public function setParams($params)
    {
        // TODO: Implement setParams() method.
    }
}