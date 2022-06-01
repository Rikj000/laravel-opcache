<?php

namespace Rikj000\Opcache\Commands;

use Illuminate\Console\Command;
use Rikj000\Opcache\Facades\Opcache;

class Compile extends Command
{
    /**
     * The console command name.
     * @var string
     */
    protected $signature = 'opcache:compile {--force}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Pre-compile your application code';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Compiling scripts...');

        $result = Opcache::compile($this->option('force') ?? false);

        if (isset($result['message'])) {
            $this->warn($result['message']);

            return 1;
        }

        if ($result) {
            $this->info(sprintf('%s of %s files compiled', $result['compiled_count'], $result['total_files_count']));
        } else {
            $this->error('OPcache not configured');

            return 2;
        }
    }
}
