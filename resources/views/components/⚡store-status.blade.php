<?php

use Livewire\Component;

new class extends Component
{
    public $store;
    public $printer;
    public $last_print;

    public function mount($store, $printer, $last_print): void
    {
        $this->store = $store;
        $this->printer = $printer;
        $this->last_print = $last_print;
    }

    #[On('update-status')]
    public function refreshData()
    {
        $this->last_print = now()->format('Y-m-d H:i:s');
    }

    public function render()
    {
        return view('livewire.store-status');
    }
};
?>
