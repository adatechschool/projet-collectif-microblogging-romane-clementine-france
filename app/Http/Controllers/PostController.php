<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post as Posts;
// on fait référence au fichier Post dans Model que l'on appelera "Posts"

class PostController extends Controller
{
    public function posts(Request $request){
        $request
        $posts = Posts::all();
        return view('posts', ['listePosts' => $posts]);
    }
}
