{{-- Ici on a le feed : tous les posts de tous les utilisateurs s'affichent. --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest posts : ') }}
        </h2>
    </x-slot>

    <div class="container" style='display:flex; align-items:center; flex-direction:column; justify-content:space-around'>
        @if (session('success'))
            <div class='aler.alert-success'
                style="background-color: rgb(197, 244, 197);border-radius:20px; padding:0.5rem; margin:0.5rem">
                {{ session('success') }}
            </div>
        @endif

        {{-- On fait une boucle pour afficher les posts --}}
        @foreach ($posts as $post)
            <div class="card" style='width:60%; margin-bottom:2rem'>
                <h5 class="card-title">Published by
                    {{-- Cette ligne permet de faire apparaître le nom de l'auteur du post, désigné par "$post->user->name" et de rediriger vers la route profile.post qui correspond à l'id de l'auteur. --}}
                    <a href="{{ route('profile.post', [$post->user_id]) }}"> {{ Str::upper($post->user->name) }} </a>at
                    {{ $post->created_at }}
                </h5>
                {{-- L'image est affichée grâce au paramètre passé dans la src "($post->image)" celui-ci contient le chemin relatif vers l'image qui est téléchargé au moment de la génération du post. --}}
                <img class="card-img-top" 
                    style='height:30rem; 
                    object-fit:contain; 
                    width:auto; background-color:black'
                    src="{{ asset($post->image) }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
