<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
// on fait référence au fichier Post dans Model que l'on appelera "Posts"

class PostController extends Controller
{
    public function allPosts()
    {
        //On demande à laravel de récupérer tous les objets dans post
        $posts = Post::orderBy('created_at', 'desc')->with('User')->get();
        // dd($posts);
        //On retourne la vue avec les posts intégrés
        // la methode compact permet de transformer les données en tableau pour les rendre accessibles à la vue.
        return view('posts', compact('posts'));
    }

    public function displayOne($user_id)
    {
        $post = Post::where('user_id', $user_id)->with('User')->get();
        return view('post', compact('post'));
    }

    //la fonction create permet d'afficher la vue (le formulaire qui contient la méthode post qui va activer la fonction store)
    public function create()
    {
        return view('create');
    }

    public function edit()
    {
        return view('update');
    }
    //la fonction store est actionnée grâce à la méthod post du formulaire généré par create et permet de récupérer et d'envoyer les données vers la BDD.
    public function store(Request $request)
    {
        //Cette ligne récupère le résultat du formulaire dans create.blade.php sur l'input nommé image. C'est un input spécifique qui récupère les fichiers.
        $image = $request->file('image');

        //Cette ligne permet de définir un nouveau nom au fichier qui est récupéré par l'input image. Le nom correspond au nombre de sec depuis 1968 + l'extension de fichier du client (png/jpeg etc...)
        $filename = now()->timestamp . '.' . $image->getClientOriginalExtension();
        
        //Cette ligne permet de déplacer le fichier image dans le dossier public images/storage et de lui appliquer son nouveau nom.
        $image->move(public_path('images/storage'), $filename);

        Post::create([
            'user_id' => $request->input('user_id'),
            'content' => $request->input('content'),
            'image' => 'images/storage/'.$filename,
        ]);
        return redirect()->route('dashboard.posts')->with('success', 'Your post was published successfully');
    }
}
