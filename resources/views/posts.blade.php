<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voici le post : ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{-- Texte qui s'affiche si la connexion est bien validée --}}
                <div class="p-6 text-gray-900">
                    {{ __("HELLO WORLD") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>