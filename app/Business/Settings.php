<?php

namespace App\Business;

class Settings
{
    public function all()
    {
        return \App\Models\Settings::query()
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->name => $item->value,
                ];
            });
    }

    public function save(string $name, mixed $value)
    {
        $settings = \App\Models\Settings::firstOrNew([
            'name' => $name,
        ]);

        $settings->value = $value;
        $settings->save();
    }

    public function get($name)
    {
        $settings = \App\Models\Settings::query()
            ->where('name', $name)
            ->first();

        return $settings ? $settings->value : null;
    }
}
