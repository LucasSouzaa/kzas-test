<?php
namespace Src\Controllers;

use Src\Traits\ErrorResponses;
use Src\Models\Uploads;

class UploadController {

    private $requestMethod, $uploads;

    public function __construct($requestMethod)
    {
        $this->requestMethod = $requestMethod;
        $this->uploads = new Uploads();
    }

    public function processRequest()
    {
        var_dump($this->requestMethod);

        switch ($this->requestMethod) {
            case 'POST':
                $response = $this->handleUpload();
                break;
            case 'DELETE':
                $response = $this->handleDelete();
                break;
            default:
                $response = ErrorResponses::notAllowed();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function handleUpload()
    {

        if (! $this->validateUpload()) {
            return ErrorResponses::unprocessableEntityResponse();
        }

        $body = json_encode($this->uploads->saveFile($_FILES['logo']));

        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = $body;

        return $response;

    }

    private function handleDelete()
    {

        if (! $this->validateDelete()) {
            return ErrorResponses::unprocessableEntityResponse();
        }

        $body = json_encode($this->uploads->removeFile($_POST['file_path']));

        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;

        return $response;

    }

    private function validateUpload()
    {

        if($_FILES['logo']['error']) {
            return false;
        }

        $mimetype = mime_content_type($_FILES['logo']['tmp_name']);
        if(!in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
            return false;
        }

        return true;
    }

    private function validateDelete()
    {

        if(!isset($_POST['file_path'])) {
            return false;
        }

        return true;

    }
}