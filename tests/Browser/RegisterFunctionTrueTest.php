<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterFunctionTrueTest extends DuskTestCase
{
    public function testTrue(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('email', rand(1, 10) . "@gmail.com" )
                ->type('name', rand(1,24 ))
                ->type('password', 'P@$$w0rD!!!')
                ->type('password_confirmation', 'P@$$w0rD!!!')
                ->press('register')
                ->assertPathIs('/login');
        });
    }
}
