{{-- Ici on a le feed : tous les posts de tous les utilisateurs s'affichent. --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed : ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <ol>
            @foreach ($posts as $post)
                <li>{{ $post->user_id }}
                    {{ $post->created_at }}
                    {{ $post->content }}
                    {{ $post->image }}</li>
            @endforeach
        </ol>
    </div>
</x-app-layout>
