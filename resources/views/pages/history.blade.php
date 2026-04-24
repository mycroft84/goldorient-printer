@extends('layouts.app')

@section('content')
    <div class="p-2 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between mb-3">
                <h1 class="text-base font-bold text-gray-800">Előzmények</h1>
                <a href="{{ route('main.index') }}" class="px-3 py-1 text-xs bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">Vissza</a>
            </div>

            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-[11px]">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">St.</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Idő</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Megnevezés</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Vonalkód</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Szériaszám</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Karát</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Gramm</th>
                            <th class="px-2 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Vételi ár</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($history as $item)
                            <tr>
                                <td class="px-2 py-2 whitespace-nowrap text-center">
                                    @if($item->status == 'pending')
                                        <span class="text-yellow-600">Függőben</span>
                                    @elseif($item->status == 'success')
                                        <span class="text-green-600">Sikeres</span>
                                    @else
                                        <span class="text-red-600">Sikertelen</span>
                                    @endif
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-400" title="{{ $item->created_at }}">{{ date('H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-900 font-medium">{{ $item->name }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-500">{{ $item->barcode }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-500">{{ $item->number }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-500 text-center">{{ $item->karat }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-500 text-right">{{ $item->weight }} g</td>
                                <td class="px-2 py-2 whitespace-nowrap text-gray-500 text-right">{{ number_format($item['price'], 0, ',', ' ') }} Ft</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 px-2">
                {{ $history->links() }}
            </div>
        </div>
    </div>
@endsection
