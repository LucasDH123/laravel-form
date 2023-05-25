<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginFunctionWrongPasswordTest extends DuskTestCase
{
    public function testWrongPassword(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('name', 'Lucas')
                ->type('password', 'a')
                ->press('login')
                ->assertSee('password does not match');
        });
    }
}
