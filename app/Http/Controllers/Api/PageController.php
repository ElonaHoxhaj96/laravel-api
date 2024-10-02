<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryS;
use App\Models\Tag;
use GrahamCampbell\ResultType\Success;

class PageController extends Controller
{
    public function index(){
        //con with() ottengo le entità in relazione 
        $posts = Post::orderBy('id', 'desc')->with('category', 'tags')->paginate(10);

        $succsess = true;
   
        $response = [
            'succsess' => $succsess,
            'results' => $posts
        ];
        //è preferibile non utilizzare il compact
        return response()->json($posts);
    }
 
    public function postBySlug($slug)
    {
        // Recupera il post in base allo slug
        $post = Post::where('slug', $slug)->with('category', 'tags')->first();
        
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }
        
        return response()->json($post);
    }

    public function categories(){
        $categories = Category::all();

        return response()->json($categories);
    }

    public function tags(){
        $tags = Tag::all();

        return response()->json($tags);
    }

    public function postByCategory( $slug ){
        $category = Category::where('slug', $slug)->with('posts')->first();
        if($category){
            $succses= true;
        }else{
            $succses= false;
        }

        return response()->json(compact('succses', 'category'));
    }
    public function postBytags( $slug ){
        $tags = Tag::where('slug', $slug)->with('posts')->first();
        if($tags){
            $succses= true;
        }else{
            $succses= false;
        }

        return response()->json(compact('succses', 'tags'));
    }
}
