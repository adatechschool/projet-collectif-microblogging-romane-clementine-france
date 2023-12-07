<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voici le post : ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <p>

            {{ $post->user_id }}
            {{ $post->content }}
            {{ $post->image }}

        </p>
    </div>
</x-app-layout>
