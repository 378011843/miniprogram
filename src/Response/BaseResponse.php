<?php


namespace Ajian\Miniprogram\Response;


use Psr\Http\Message\ResponseInterface;
use think\Exception;

abstract class BaseResponse
{
    public $errcode;
    public $errmsg;
    public $error = false;
    public $rawData;

    public function __construct(ResponseInterface $response)
    {
        $this->generateResponse($response);
    }

    public function generateResponse(ResponseInterface $response)
    {
        try {
            if ($response->getStatusCode() == 200) {
                $content = json_decode($response->getBody()->getContents(), true);
                $this->rawData = $content;
                if (isset($content['errmsg'])) {
                    $this->errmsg = $content['errmsg'];
                }
                if (isset($content['errcode'])) {
                    $this->errcode = $content['errcode'];
                }
                if (isset($content['errcode']) && $content['errcode'] != 0) {
                    $this->error = true;
                }
                $this->init($content);
            } else {
                $this->error = true;
            }
        } catch (\Exception $e) {
            throw new \Exception("Api Request Error");
        }
    }

    public function getErrorMsg()
    {
        return $this->errmsg;
    }

    public function getErrorCode()
    {
        return $this->errcode;
    }

    public function getIsError()
    {
        return $this->error;
    }

    abstract public function init($content);
}