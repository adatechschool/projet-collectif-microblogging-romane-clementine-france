{{-- cette page gère l'affichage de la biographie --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit your profile
        </h2>
    </x-slot>

    <form class="container" style='margin-top:2rem;' method="post">
        @csrf 
        @method('PATCH')
        {{-- le type=hidden permet de récupérer une information tout en la cachant aux yeux des utilisateurs --}}
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <div class="form-group" style='display:flex; flex-direction:column; margin:2rem'>
            <label style="margin-bottom:0.5rem;"for="exampleFormControlTextarea1">Biography</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="biography"></textarea>
        </div>
        <x-primary-button type="submit" style='margin-left:2rem' class="btn btn-primary">Update</x-primary-button>
    </form>
</x-app-layout>
