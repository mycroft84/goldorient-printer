<div wire:poll.10s="refreshData" class="space-y-3 text-gray-700">
    <div class="p-2 bg-indigo-50 rounded-lg">
        <p class="text-[10px] text-indigo-400 font-semibold uppercase tracking-wider mb-0.5 text-center">Bolt</p>
        <p class="text-sm font-bold text-indigo-900 leading-tight text-center">{{ $store }}</p>
    </div>

    <div class="p-2 bg-gray-50 rounded-lg">
        <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider mb-0.5 text-center">Nyomtató</p>
        <p class="text-sm font-bold text-gray-900 leading-tight text-center">{{ $printer }}</p>
    </div>

    <a href="{{ route('main.history') }}" class="block p-2 bg-gray-50 rounded-lg border-l-4 border-indigo-500 text-center hover:bg-indigo-100 transition duration-150">
        <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider mb-0.5">Utolsó nyomtatás</p>
        <p class="text-sm font-medium text-gray-800 leading-tight">{{ $last_print }}</p>
    </a>
</div>
