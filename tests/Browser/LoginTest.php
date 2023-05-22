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
            $browser->value('@login_name', 'Lucas');
            $browser->value('@login_password', 'Lelzdbk1dw!');
            $browser->press('@login_button');
            $browser->assertSee('Current user: Lucas');
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
