<?php

namespace Rikj000\Opcache\Test;

use Artisan;

class ConfigTest extends TestCase
{
    /** @test */
    public function shows_config()
    {
        Artisan::call('opcache:config', []);

        $output = Artisan::output();

        $this->assertStringContainsStringIgnoringCase('Version info', $output);
        $this->assertStringContainsStringIgnoringCase('Configuration info', $output);
    }
}
