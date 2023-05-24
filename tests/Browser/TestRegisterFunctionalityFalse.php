<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestRegisterPageVisibility extends DuskTestCase
{

    public function TestRegisterFunctionalityFalse(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
            ->type('@register_email', "aaaaaaaaaaaaaa")
            ->type('@register_name', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
            ->type('@register_password', '1')
            ->press('@register_button')
            ->assertSee('The password must be at least 10 characters.')
            ->assertSee('The name must not be greater than 25 characters.')
            ->assertSee('The password confirmation does not match.');
        });
    }

    
}
