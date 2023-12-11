{{-- Ici on affiche les posts d'un user : il faudra que chaque nom d'utilisateur cliqué permette d'accéder à la page de ses posts. --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voici le post : ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($post as $objet)
            <li>{{ $objet->user_id }}
                {{ $objet->content }}
                {{ $objet->image }}</li>
        @endforeach
    </div>
</x-app-layout>
