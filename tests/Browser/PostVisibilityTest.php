<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostVisibilityTest extends DuskTestCase
{
    public function testVisibility(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posts')
            ->assertSee('See all our posts!');

        });
    }

}
