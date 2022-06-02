<?php

namespace Tests\Feature\Middleware;

use Tests\TestCase;

/**
 * Class SwitchLanguageTest.
 */
class SwitchLanguageTest extends TestCase
{
    /** @test */
    public function the_language_can_be_switched()
    {
        $response = $this->get('/lang/hi');

        $response->assertSessionHas('locale', 'hi');
    }
}
