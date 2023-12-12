{{-- Ici on a le feed : tous les posts de tous les utilisateurs s'affichent. --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest posts : ') }}
        </h2>
    </x-slot>

    <div class="container" style='display:flex; align-items:center; flex-direction:column'>
        @if (session('success'))
            <div class='aler.alert-success'
                style="background-color: rgb(197, 244, 197);border-radius:20px; padding:0.5rem; margin:0.5rem">
                {{ session('success') }}
            </div>
        @endif
        @foreach ($posts as $post)
            <div class="card" style='width:60%; margin-bottom:2rem'>
                <h5 class="card-title">Published by
                    <a href="{{ route('profile.post', [$post->user_id]) }}"> {{ Str::upper($post->user->name) }} </a>at
                    {{ $post->created_at }}
                </h5>
                <img class="card-img-top" src="{{ asset('https://picsum.photos/200/300') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
