<?php 
namespace App\Http\Controllers\Api;

use App\Models\Post;

trait ApiResponsesTrait
{

     public function apiResponse($data = null,$message = null,$status = null){

        $array = [
            'data' => $data,
            'message'=> $message,
            'status'=>$status,
            ];

      return response($array,$status);



     }



}