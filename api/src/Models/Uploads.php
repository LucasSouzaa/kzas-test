<?php
namespace Src\Models;

use Src\Traits\ErrorResponses;

class Uploads {

    public function saveFile($file)
    {
        try
        {

            $path = 'uploads/';

            $date = new \DateTime();

            $file_name = $date->getTimestamp().$file['name'];
            $file_tmp = $file['tmp_name'];
            $file_type = $file['type'];
            $file_size = $file['size'];
            $file_ext = strtolower(end(explode('.', $_FILES['files']['name'])));

            $file = $path.$file_name;

            move_uploaded_file($file_tmp, $file);

            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".$file;

            return [
                'success'       => true,
                'url'           => $url,
                'file_location' => $file,
            ];

        } catch (\Exception $e)
        {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

    }

    public function removeFile($file)
    {
        try
        {

            unlink($file);
            return [
                'success' => true,
                'message' => "Removido com sucesso"
            ];

        } catch (\Exception $e)
        {

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];

        }

    }

}