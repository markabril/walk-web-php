<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LogToConsole extends Command
{
    protected $signature = 'log:console';

    protected $description = 'Log message to console';

    public function handle()
    {

        Log::info('This is an informational message.');
        Log::error('This is an error message.');
    }
}
