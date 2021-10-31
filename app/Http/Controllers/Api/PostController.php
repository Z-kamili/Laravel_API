<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use ApiResponsesTrait;
    
    public function index(){

        $posts = PostResource::collection(Post::get());
        return $this->apiResponse($posts,'ok',200);

    }
  public function show($id){

    $post = new PostResource(Post::find($id));

    if($post){

        return $this->apiResponse($post,'ok',200);

    }else{


        return $this->apiResponse(null,'This post not found',401);

    }

   
     


  }

}
