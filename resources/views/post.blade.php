{{-- Ici on affiche les posts d'un user : il faudra que chaque nom d'utilisateur cliqué permette d'accéder à la page de ses posts. --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome to the profile of {{ Str::upper($post[0]->user->name) }}
        </h2>
        <div>
            <p>{{ $post[0]->user->biography }}</p>
            <x-primary-button style='margin:1rem'
                onclick="window.location='{{ route('profile.edit') }}'">Edit...</x-primary-button>
        </div>
    </x-slot>

    <div class="flex flex-wrap justify-around my-4"
        style='display:flex; justify-content:flex-start; width:100%; margin-top: 1rem;margin-rigth:2rem; margin-left:2rem'>
        @foreach ($post as $objet)
            <div class="max-w-sm rounded overflow-hidden shadow-lg mx-4 mb-4 md:w-1/4"
                style='margin-left:1rem; width:22%'>
                <img class="w-full" src="{{ asset('https://picsum.photos/200/300') }}" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <p class="text-gray-700 text-base">
                        {{ $objet->content }}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $objet->user->name }}</span>
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $objet->created_at }}</span>
                </div>
            </div>

            @if ($loop->iteration % 4 == 0 && !$loop->last)
    </div>
    <div class="flex flex-wrap justify-around my-4"
        style='display:flex; justify-content:flex-start; width:100%; margin-top: 1rem;margin-rigth:2rem; margin-left:2rem'>
        @endif
        @endforeach
    </div>


</x-app-layout>
