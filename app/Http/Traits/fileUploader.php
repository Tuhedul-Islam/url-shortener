<?php
namespace App\Http\Traits;

use App\Libraries\WebApiResponse;
use Illuminate\Support\Facades\Storage;

trait fileUploader {

    public function ImageUpload($exploded_ImgFile, $folder){
        try {
            $file_type_check = 0;
            $size_check = 0;

            $file = explode( ',', $exploded_ImgFile );
            $imageExtension = explode('/', mime_content_type($exploded_ImgFile))[1];
            if ($imageExtension == 'vnd.openxmlformats-officedocument.wordprocessingml.document'){
                $imageExtension = 'docx';
            }

            $file_base64_decode = base64_decode($file[1]);
            $random_digit_generate = str_pad(rand(1, 5000), 5, "0", STR_PAD_LEFT);
            $file_name_to_store = md5(now().$random_digit_generate).'.'.$imageExtension;

            //File Type Check
            $type_array = ['pdf', 'docx', 'jpeg', 'jpg', 'png', ''];
            if (in_array(strtolower($imageExtension), $type_array)){
                $file_type_check = 1;
            }

            //File Size Check
            $file_size = $this->getBase64FileSize($file[1]);
            if ($file_size<=3){
                $size_check = 1;
            }

            if (($file_type_check==1) && ($size_check==1)){
                Storage::disk($folder)->put($file_name_to_store, $file_base64_decode);
                return "/images/$folder/".$file_name_to_store;
            }else{
                return 'upload_failed';
            }

        } catch (\Throwable $th) {
            return WebApiResponse::error(404, $errors = [$th->getMessage()], trans('messages.success_upload_failed'));
        }
    }

    public function getBase64FileSize($base64Image){
        try{
            $size_in_bytes = (int) (strlen(rtrim($base64Image, '')) * 3 / 4);
            $size_in_kb    = $size_in_bytes / 1024;
            $size_in_mb    = $size_in_kb / 1024;

            return number_format($size_in_mb, 2, '.', ',');
        }
        catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public static function fileUploadErrorResponse($field_name)
    {
        return WebApiResponse::fileUploadError(404, $errors = ['field'=>$field_name, 'value'=>$field_name, 'message'=>[trans('messages.file_size_type_check_fail')]], trans('messages.file_size_type_check_fail'));
    }
}
