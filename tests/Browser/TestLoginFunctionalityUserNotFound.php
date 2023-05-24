<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestLoginFunctionalityUserNotFound extends DuskTestCase
{
    public function TestLoginFunctionalityUserNotFound(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@login_name', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA')
                ->type('@login_password', 'Lelzdbk1dw!')
                ->press('@login_button')
                ->assertSee('user not found');
        });
    }
}