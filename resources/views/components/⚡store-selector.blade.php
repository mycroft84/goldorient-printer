<?php

use Livewire\Component;

new class extends Component
{
    public $stores = [];
    public $printers = [];

    // Ezek fogják tárolni a kiválasztott értékeket
    public $selectedStore = '';
    public $selectedStoreName = '';
    public $selectedPrinter = '';

    public function mount($stores, $printers, $selectedStore = '', $selectedPrinter = '')
    {
        $this->stores = $stores;
        $this->printers = $printers;
        $this->selectedStore = $selectedStore;
        $this->selectedPrinter = $selectedPrinter;

        // Ha van kiválasztott bolt, keressük meg a nevét is a listában
        if ($this->selectedStore) {
            foreach ($this->stores as $store) {
                if ($store['id'] == $this->selectedStore) {
                    $this->selectedStoreName = $store['name'];
                    break;
                }
            }
        }
    }

    public function save()
    {
        // Validálás (opcionális)
        $this->validate([
            'selectedStore' => 'required',
            'selectedPrinter' => 'required',
        ]);

        (new \App\Business\Settings())->save('storeId',$this->selectedStore);
        (new \App\Business\Settings())->save('store',$this->selectedStoreName);
        (new \App\Business\Settings())->save('printer',$this->selectedPrinter);

        session()->flash('message', 'Sikeres mentés!');
    }

    public function setStoreName($name)
    {
        $this->selectedStoreName = $name;
    }

    public function render()
    {
        return view('livewire.store-selector');
    }
};
?>
