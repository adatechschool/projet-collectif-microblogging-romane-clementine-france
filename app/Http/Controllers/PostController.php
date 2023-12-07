<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// on fait référence au fichier Post dans Model que l'on appelera "Posts"

class PostController extends Controller
{
    public function allPosts(){
        //On demande à laravel de récupérer tous les objets dans post
        $posts=Post::get();
        // dd($posts);
        //On retourne la vue avec les posts intégrés
        return view('posts', compact('posts'));
    }

    public function displayOne($user_id){
        $post=Post::find($user_id);
        return view('post', compact('post'));
    }
}
