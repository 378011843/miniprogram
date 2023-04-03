<?php


namespace Ajian\Miniprogram\Api;


use GuzzleHttp\Client;

abstract class BaseApi
{
    private $client;

    protected function client(){
        if(!$this->client){
            $this->client = new Client();
        }
        return $this->client;
    }

    abstract public function request();

    abstract public function setParams($params);
}