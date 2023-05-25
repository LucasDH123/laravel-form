<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginFunctionTrueTest extends DuskTestCase
{
    public function testTrue(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('name', 'Lucas')
                ->type('password', 'Lelzdbk1dw!')
                ->press('login')
                ->assertSee('Home');
        });
    }
}
