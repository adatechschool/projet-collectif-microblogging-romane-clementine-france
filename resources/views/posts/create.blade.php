<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new post') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1>Create a Post</h1>
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" required>
                        <br>
                        <label for="content">Content:</label>
                        <textarea name="content" id="content" rows="4" required></textarea>
                        <br>
                        <button type="submit">Create Post</button>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
