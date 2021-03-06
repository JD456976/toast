<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_login_and_logout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->type('email', 'craig219@comcast.net')
                    ->type('password', 'UPsidedown666!')
                    ->press('Login')
                    ->click('@user-dropdown')
                    ->press('Logout')
                    ->pause(2000)
                    ->assertSee('LOGIN');
        });
    }
}
