<?php

namespace App\Console\Commands;

use App\Business\Api;
use App\Business\History;
use App\Jobs\PrintLabel;
use Illuminate\Console\Command;

class SyncPrintLabels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'labels:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $labels = (new Api())->labels();
        if (empty($labels)) {
            return;
        }

        foreach ($labels as $item) {
            $history = (new History())->save($item);
            if (!$history) {
                continue;
            }

            PrintLabel::dispatch($history);
        }
    }
}
