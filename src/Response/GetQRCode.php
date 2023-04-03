<?php


namespace Ajian\Miniprogram\Response;


class GetQRCode extends BaseResponse
{
    private $buffer;

    public function init($content)
    {
        if ($this->error == false){
            $this->buffer = $this->rawData;
        }
    }

    public function getBuffer(){
        return $this->buffer;
    }
}