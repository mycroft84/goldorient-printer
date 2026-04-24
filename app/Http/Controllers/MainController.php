<?php

namespace App\Http\Controllers;

use App\Business\Api;
use App\Business\History;
use App\Business\Printer;
use App\Business\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Native\Desktop\Facades\System;

class MainController extends Controller
{
    public function index()
    {
        $settings = (new Settings())->all();

        return view('pages.index', [
            'store' => $settings->get('store'),
            'printer' => $settings->get('printer'),
            'last_print' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function settings()
    {
        $printers = (new Printer())->list();
        /*$printers = [
            ['id' => 'ZDesigner TLP 2844', 'name' => 'ZDesigner TLP 2844'],
        ];*/
        $shops = (new Api())->shops();

        $settings = (new Settings())->all();

        return view('pages.settings', [
            'stores' => Arr::get($shops, 'shops', []),
            'printers' => $printers,
            'storeId' => $settings->get('storeId'),
            'printer' => $settings->get('printer'),
        ]);
    }
    public function history()
    {
        $history = (new History())->get();

        return view('pages.history', [
            'history' => $history,
        ]);
    }
}
