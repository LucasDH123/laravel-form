<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestRegisterFunctionalityTrue extends DuskTestCase
{

    public function TestRegisterFunctionalityTrue(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('@register_email', rand(1, 10) . "@gmail.com" )
                ->type('@register_name', rand(1,24 ))
                ->type('@register_password', 'P@$$w0rD!!!')
                ->type('@register_password_confirm', 'P@$$w0rD!!!')
                ->press('@register_button')
                ->assertPathIs('/login');
        });
    }
}
