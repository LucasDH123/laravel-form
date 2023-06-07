<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    public function testLoginVisibility(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('enter your information below.');
        });
    }

    public function TestLoginFunctionalityTrue(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@login_user', 'Lucas')
                ->type('password', 'Lelzdbk1dw!')
                ->press('@login_button')
                ->assertPathIs('/dashboard');
        });
    }

    public function TestLoginFunctionalityFalse(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@login_user', '0')
                ->type('password', 'xxx')
                ->press('@login_button')
                ->assertPathIsNot('/dashboard');
        });
    }
}
