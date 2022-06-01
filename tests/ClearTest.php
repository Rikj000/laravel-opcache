<?php

namespace Rikj000\Opcache\Test;

use Artisan;

class ClearTest extends TestCase
{
    /** @test */
    public function is_cleared()
    {
        Artisan::call('opcache:clear', []);

        $output = Artisan::output();

        $this->assertStringContainsStringIgnoringCase('cleared', $output);
    }
}
