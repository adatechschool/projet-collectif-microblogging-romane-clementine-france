<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// on fait référence au fichier Post dans Model que l'on appelera "Posts"

class PostController extends Controller
{
    public function allPosts(){
        //On demande à laravel de récupérer tous les objets dans post
        $posts=Post::orderBy('created_at', 'desc')->get();
        // dd($posts);
        //On retourne la vue avec les posts intégrés
        // la methode compact permet de transformer les données en tableau pour les rendre accessibles à la vue.
        return view('posts', compact('posts'));
    }

    public function displayOne($user_id){
        $post=Post::where('user_id', $user_id)->get();
        return view('post', compact('post'));
    }

    //la fonction create permet d'afficher la vue (le formulaire qui contient la méthode post qui va activer la fonction store)
    public function create(){
        return view('create');
    }
    //la fonction store est actionnée grâce à la méthod post du formulaire généré par create et permet de récupérer et d'envoyer les données vers la BDD.
    public function store(Request $request){
        $post=Post::create([
            'user_id'=>$request->input('user_id'),
            'content'=>$request->input('content'),
            'image'=>$request->input('image'),
        ]);
        return redirect()->route('dashboard.posts')->with('success', 'Your post was published successfully');
    }
}
