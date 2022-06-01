<?php

namespace JustRaviga\Opcache\Test;

use Artisan;

class CompileTest extends TestCase
{
    /** @test */
    public function optimizes()
    {
        Artisan::call('opcache:compile --force', []);

        $output = Artisan::output();

        $this->assertStringContainsStringIgnoringCase('files compiled', $output);
    }
}
