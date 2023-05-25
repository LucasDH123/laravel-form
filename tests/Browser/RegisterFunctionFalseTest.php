<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterFunctionFalseTest extends DuskTestCase
{
    
    public function testFalse(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
            ->type('email', "aaaaaaaaaaaaaa@gmail.com")
            ->type('name', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
            ->type('password', '1')
            ->type('password_confirmation', '12')
            ->press('register')
            ->assertSee('The password must be at least 10 characters.')
            ->assertSee('The name must not be greater than 25 characters.')
            ->assertSee('The password confirmation does not match.');
        });
    }
}
