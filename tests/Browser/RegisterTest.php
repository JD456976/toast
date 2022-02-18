<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                ->type('email', 'craig219@comcast.net')
                ->type('name', 'Jason Craig')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('Register');
        });
    }
}
