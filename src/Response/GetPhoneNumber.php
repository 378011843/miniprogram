<?php


namespace Ajian\Miniprogram\Response;


class GetPhoneNumber extends BaseResponse
{
    private $phone_info;

    public function init($content)
    {
        if (isset($content['phone_info'])){
            $this->phone_info = $content['phone_info'];
        }
    }

    public function getPhoneInfo(){
        return $this->phone_info;
    }
}