<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestLoginFunctionalityTrue extends DuskTestCase
{


    public function TestLoginFunctionalityTrue(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('@login_user', 'Lucas')
                ->type('@login_password', 'Lelzdbk1dw!')
                ->press('@login_button')
                ->assertSee('Home');
        });
    }
}
