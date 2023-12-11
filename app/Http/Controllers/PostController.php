<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// on fait référence au fichier Post dans Model que l'on appelera "Posts"

class PostController extends Controller
{
    public function allPosts(){
        //On demande à laravel de récupérer tous les objets dans post
        $posts=Post::orderBy('created_at')->get();
        // dd($posts);
        //On retourne la vue avec les posts intégrés
        return view('posts', compact('posts'));
    }

    public function displayOne($user_id){
        $post=Post::where('user_id', $user_id)->get();
        return view('post', compact('post'));
    }
}
