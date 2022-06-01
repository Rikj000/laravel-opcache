<?php

namespace Rikj000\Opcache\Commands;

use Illuminate\Console\Command;
use Rikj000\Opcache\Facades\Opcache;

class Clear extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear OPCache';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cleared = Opcache::clear();

        if ($cleared) {
            $this->info('OPcache cleared');
        } else {
            $this->error('OPcache not configured');

            return 2;
        }
    }
}
