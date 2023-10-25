<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CacheApp extends Command
{
    protected $signature = 'cache';

    protected $description = 'Command description';

    public function handle()
    {
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return $this->info('Cache !');
    }
}
