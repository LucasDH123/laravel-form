<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestLoginFunctionalityEmpty extends DuskTestCase
{
    public function TestLoginFunctionalityEmpty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@login_name', '')
                ->type('@login_password', '')
                ->press('@login_button')
                ->assertSee('The name field is required.')
                ->assertSee('The password field is required.');
        });
    }
}