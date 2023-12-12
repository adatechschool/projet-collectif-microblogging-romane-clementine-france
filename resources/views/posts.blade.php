{{-- Ici on a le feed : tous les posts de tous les utilisateurs s'affichent. --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed : ') }}
        </h2>
    </x-slot>

    <div class="container" style='display:flex; align-items:center; flex-direction:column'>
        @foreach ($posts as $post)
            <div class="card" style='width:60%; margin-bottom:2rem'>
                <h5 class="card-title">Published by
                    {{ $post->user_id }} at
                    {{ $post->created_at }}
                </h5>
                <img class="card-img-top" src="{{ asset('images/logo512.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
