<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

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
        dump($post);
    
      
    }
}
