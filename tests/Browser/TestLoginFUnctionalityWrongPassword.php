<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestLoginFUnctionalityWrongPassword extends DuskTestCase
{
    public function TestLoginFUnctionalityWrongPassword(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@login_name', 'Lucas')
                ->type('@login_password', 'a')
                ->press('@login_button')
                ->assertSee('password does not match');
        });
    }
}