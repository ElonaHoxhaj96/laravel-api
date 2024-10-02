<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();

        $succsess = true;

        $response = [
            'succsess' => $succsess,
            'results' => $posts
        ];
        //è preferibile non utilizzare il compact
        return response()->json($response);
    }
}
