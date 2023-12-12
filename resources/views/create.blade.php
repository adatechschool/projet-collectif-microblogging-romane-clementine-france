<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Create a new post : ') }}
        </h2>
    </x-slot>

    <form class="container" style='margin-top:2rem' method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Download</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        </div>
        <x-primary-button type="submit" class="btn btn-primary">New Post</x-primary-button>
    </form>
</x-app-layout>
