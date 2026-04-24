<?php

namespace App\Jobs;

use App\Business\Settings;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class PrintLabel implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public History $history) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $printer = (new Settings())->get('printer');

        //try {
            $connector = new WindowsPrintConnector($printer);
            $printer = new Printer($connector);

            $epl = (new \App\Business\History())->eplData($this->history);

            $connector->write($epl);
            $printer->close();

            $this->history->update(['status' => 'success']);
        /*} catch (\Throwable $th) {
            $this->history->update(['status' => 'failed']);
        }*/
    }
}
