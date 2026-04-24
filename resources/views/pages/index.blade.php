@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center p-2 bg-gray-100 min-h-screen">
        <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow-md mt-2">
            <h1 class="mb-3 text-lg font-bold text-gray-800 text-center text-indigo-700">Üdvözöljük!</h1>

            @if($store and $printer)
                <livewire:store-status :store="$store" :printer="$printer" :last_print="$last_print" />
            @endif


            <div class="mt-4 flex justify-center">
                <a href="{{ route('main.settings') }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-full shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    Beállítások
                </a>
            </div>
        </div>
    </div>
@endsection
