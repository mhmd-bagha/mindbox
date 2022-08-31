<?php

namespace Response;

class Response
{
    public static function Json($statusCode, $statusMessage, $data = [])
    {
        global $response;
        $response = array(
            'data' => $data,
            'statusCode' => $statusCode,
            'statusMessage' => $statusMessage
        );
        $response = json_encode($response);
        return $response;
    }

    public static function unJson($statusCode, $statusMessage, $data = [])
    {
        global $response;
        $response = array(
            'data' => $data,
            'statusCode' => $statusCode,
            'statusMessage' => $statusMessage
        );
        $response = json_decode(json_encode($response, false));
        return $response;
    }
}