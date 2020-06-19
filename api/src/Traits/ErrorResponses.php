<?php
namespace Src\Traits;

trait ErrorResponses {

    public static function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    public static function notAllowed()
    {
        $response['status_code_header'] = 'HTTP/1.1 405 Method Not Allowed';
        $response['body'] = json_encode(['error' => true, 'message' => 'Method Not Allowed']);
        return $response;
    }

}