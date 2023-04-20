<?php


namespace Ajian\Miniprogram\Response;


class GenerateScheme extends BaseResponse
{
    private $openlink;

    public function init($content)
    {
        if(isset($content['openlink'])){
            $this->openlink = $content['openlink'];
        }
    }

    public function getOpenLink(){
        return $this->openlink;
    }
}