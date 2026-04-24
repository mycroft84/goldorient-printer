<?php

namespace App\Business;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class History
{
    public function save(mixed $item)
    {
        $history = \App\Models\History::firstOrNew([
            'outer_id' => Arr::get($item, 'id'),
        ]);
        if ($history->exists) {
            return false;
        }

        $history->name = Arr::get($item, 'name');
        $history->barcode = Arr::get($item, 'barcode');
        $history->number = Arr::get($item, 'serial');
        $history->karat = Arr::get($item, 'karat');
        $history->weight = Arr::get($item, 'weight');
        $history->size = Arr::get($item, 'size');
        $history->color = Arr::get($item, 'color');
        $history->price = Arr::get($item, 'outcomePrice');
        $history->status = 'pending';
        $history->save();

        return $history;
    }

    public function eplData(\App\Models\History $history)
    {
        $name1 = Str::substr($history->name, 0, 14);
        $name2 = Str::substr($history->name, 14, 14);

        $epl = "I8,11\n";
        $epl .= "ZB\n";
        $epl .= "D10\n";
        $epl .= "S2\n";
        $epl .= "o\n";
        $epl .= "JF\n";
        $epl .= "N\n";
        $epl .= "q640\n";
        $epl .= "Q090,12+0\n";
        $epl .= "R120,0\n";
        $epl .= "A50,0,0,1,1,1,N,\"{$this->convert($name1)}\"\n";
        $epl .= "A50,16,0,1,1,1,N,\"{$this->convert($name2)}\"\n";
        $epl .= "A50,32,0,1,1,1,N,\"{$this->convert($history->color)}\"\n";
        $epl .= "A144,32,0,1,1,1,N,\"{$history->size}\"\n";
        $epl .= "A50,54,0,3,1,1,N,\"{$history->price} HUF\"\n";
        $epl .= "LE20,46,198,1\n";
        $epl .= "LW190,0,50,70\n";
        $epl .= "B193,0,0,E80,2,1,30,N,\"{$history->barcode}\"\n";
        $epl .= "A208,33,0,2,1,1,N,\"{$this->convert($history->number)}\"\n";
        $epl .= "A208,54,0,2,1,1,N,\"{$history->karat}\"\n";
        $epl .= "A284,54,0,2,1,1,N,\"{$history->weight} gr\"\n";
        $epl .= "P1\n";

        return $epl;
    }

    public function convert($text)
    {
        return iconv("UTF-8", "Windows-1250//TRANSLIT", $text);
    }

    public function get($limit = 10)
    {
        return \App\Models\History::query()
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->paginate($limit)
            ->withQueryString();
    }
}
