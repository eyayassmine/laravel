<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
        </h2>
    </x-slot>

   <!-- @include('layouts/partials/navbar')-->


            <div class="container">
                <!-- Include the navbar component -->
                <!-- Rest of the content -->
            </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #CCCCCC;">
                <div class="p-6 text-gray-200">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
