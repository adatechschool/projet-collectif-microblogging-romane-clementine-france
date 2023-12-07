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
                    {{ $post->content }}
                    {{ $post->image }}</li>
            @endforeach
        </ol>
    </div>
</x-app-layout>
