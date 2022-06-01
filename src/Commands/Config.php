<?php

namespace Rikj000\Opcache\Commands;

use Illuminate\Console\Command;
use Rikj000\Opcache\Facades\Opcache;

class Config extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show your OPcache configuration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $config = Opcache::getConfig();

        if ($config) {
            $this->line('Version info:');
            $this->table([], $this->parseTable($config['version']));

            $this->line(PHP_EOL.'Configuration info:');
            $this->table([], $this->parseTable($config['directives']));
        } else {
            $this->error('OPcache not configured');

            return 2;
        }
    }

    /**
     * Make up the table for console display.
     *
     * @param $input
     *
     * @return array
     */
    protected function parseTable($input)
    {
        $input = (array) $input;

        return array_map(function ($key, $value) {
            $bytes = ['opcache.memory_consumption'];

            if (in_array($key, $bytes)) {
                $value = number_format($value / 1048576, 2).' MB';
            } elseif (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }

            return [
                'key'       => $key,
                'value'     => $value,
            ];
        }, array_keys($input), $input);
    }
}
