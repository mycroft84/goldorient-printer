<form wire:submit="save" method="post" class="space-y-3">
    @if (session()->has('message'))
        <div class="p-2 text-xs text-green-700 bg-green-100 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div>
        <label for="store" class="block text-xs font-medium text-gray-700">Válassz boltot</label>
        <select
            wire:model="selectedStore"
            x-on:change="$wire.setStoreName($event.target.selectedOptions[0].dataset.name)"
            id="store" class="block w-full px-2 py-1.5 mt-1 border border-gray-300 rounded-md shadow-sm text-xs" required>
            <option value="">Kérlek válassz...</option>
            @foreach($stores as $s)
                <option value="{{ $s['id'] }}" data-name="{{ $s['name'] }}">{{ $s['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="printer" class="block text-xs font-medium text-gray-700">Válassz nyomtatót</label>
        <select wire:model="selectedPrinter" id="printer" class="block w-full px-2 py-1.5 mt-1 border border-gray-300 rounded-md shadow-sm text-xs" required>
            <option value="">Kérlek válassz...</option>
            @foreach($printers as $p)
                <option value="{{ $p['id'] }}">{{ $p['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="pt-2 space-y-2">
        <button type="submit" class="flex justify-center w-full px-4 py-1.5 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none">
            <span wire:loading.remove>Mentés</span>
            <span wire:loading>Folyamatban...</span>
        </button>
        <a href="{{ route('main.index') }}" class="flex justify-center w-full px-4 py-1.5 text-xs font-medium text-indigo-600 bg-white border border-indigo-600 rounded-md shadow-sm hover:bg-indigo-50">
            Vissza
        </a>
    </div>
</form>
