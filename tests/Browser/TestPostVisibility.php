<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MakePostTest extends DuskTestCase
{

    public function MakePostTest(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->value('@login_name', 'Lucas')
                    ->value('@login_password', 'Lelzdbk1dw!')
                    ->press('@login_button');
        });
    }

}
