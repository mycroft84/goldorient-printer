<?php

namespace App\Business;

use Native\Desktop\Facades\System;

class Printer
{
    public function list()
    {
        $printers = System::printers();

        $result = [];
        /**
         * @var \Native\Desktop\DataObjects\Printer $printer
         */
        foreach ($printers as $printer) {
            $result[] = [
                'id' => $printer->displayName,
                'name' => $printer->displayName,
            ];
        }

        return $result;
    }
}
