<?php


namespace Ajian\Miniprogram\Response;


class GetApiQuota extends BaseResponse
{
    /**
     * @var $quota array
     * daily_limit	number	当天该账号可调用该接口的次数
     * used	number	当天已经调用的次数
     * remain	number	当天剩余调用次数
     */
    private $quota;

    public function init($data)
    {
        if (isset($data['quota'])){
            $this->quota = $data['quota'];
        }
    }

    public function getQuota(){
        return $this->quota;
    }
}