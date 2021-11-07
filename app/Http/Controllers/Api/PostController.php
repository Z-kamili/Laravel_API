<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PostController extends Controller
{

    use ApiResponsesTrait;
    
    public function index(){
        $posts = PostResource::collection(Post::get());
        return $this->apiResponse($posts,'ok',200);

    }
  public function show($id){

    $post = Post::find($id);

    if($post){

        return $this->apiResponse(new PostResource($post),'ok',200);

    }else{


        return $this->apiResponse(null,'This post not found',401);

    }

   
     


  }

  public function store(Request $request){

//     $validator = Validator::make($request->all(),[
//       'title' => 'required|max:255',
//       'body' => 'required',
//   ]);
 

//   if ($validator->fails()) {
//     return $this->apiResponse(null,$validator->errors(),400);
// }

       $validator = FacadesValidator::make($request->all(), [
               'title' => 'required|max:255',
               'body' => 'required',
]);

        if($validator->fails()){
          return $this->apiResponse(null,'The post Not Found',400);
        }


    $post = Post::create($request->all());

    if($post){
      return $this->apiResponse(new PostResource($post),'ok',201);
    }

    return $this->apiResponse(null,'The post Not Found',400);


  }

}
