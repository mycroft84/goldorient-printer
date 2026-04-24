@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center p-2 bg-gray-100 min-h-screen">
        <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow-md mt-2">
            <h2 class="mb-4 text-lg font-bold text-center text-gray-800">Beállítások</h2>

            <livewire:store-selector :stores="$stores" :printers="$printers" :selected-store="$storeId" :selected-printer="$printer" />

        </div>
    </div>
@endsection
