<?php

namespace JustRaviga\Opcache\Test;

use Artisan;

class StatusTest extends TestCase
{
    /** @test */
    public function shows_status()
    {
        Artisan::call('opcache:status', []);

        $output = Artisan::output();

        $this->assertStringContainsStringIgnoringCase('Memory usage:', $output);
        $this->assertStringContainsStringIgnoringCase('Interned strings usage:', $output);
        $this->assertStringContainsStringIgnoringCase('Statistics:', $output);
    }
}
