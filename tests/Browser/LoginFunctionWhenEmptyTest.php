<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginFunctionWhenEmptyTest extends DuskTestCase
{
   
    public function testEmpty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('name', '')
                ->type('password', '')
                ->press('login')
                ->assertSee('The name field is required.')
                ->assertSee('The password field is required.');
        });
    }
}
