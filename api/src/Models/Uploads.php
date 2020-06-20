<?php
namespace Src\Models;

use Src\Traits\ErrorResponses;

class Uploads {

    public function saveFile($file)
    {
        try
        {

            $path = 'uploads/';


            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }


            $date = new \DateTime();

            $file_name = $date->getTimestamp().$file['name'];
            $file_tmp = $file['tmp_name'];
            $file_type = $file['type'];
            $file_size = $file['size'];
            $file_ext = strtolower(end(explode('.', $_FILES['files']['name'])));

            $file = $path.$file_name;

            move_uploaded_file($file_tmp, $file);

            $protocol = 'http://';
            if( isset($_SERVER['HTTPS']) ) {
                $protocol = 'https://';
            }

            $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".$file;

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

            if(file_exists($file)){
                unlink($file);
            }

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