<?php
namespace Controllers;

use BaseController;
use Input;
use Response;

class FilehandlerController extends BaseController {
    public function upload_image()
    {
        $this->layout = null;
        $files = Input::file('files'); // your file upload input field in the form should be named 'file'
        dd($_FILES);
        if($files){
            $res = array('files' => array());
            foreach($files as $index => $file){
                echo 'f';
                $destinationPath = 'upload/images/';
                $filename = $file->getClientOriginalName();
                $extension =$file->getClientOriginalExtension(); //if you need extension of the file
                $filename = str_random(8).'.'.strtolower($extension);
                $uploadSuccess = $file->move($destinationPath, $filename);
                array_push($res['files'], $filename);
            }
            if( $uploadSuccess ) {
                return Response::json($res, 200); // or do a redirect with some message that file was uploaded
            } else {
                return Response::json('error', 400);
            }
        } else {
            echo 'no files uploaded.';
        }
    }
}
