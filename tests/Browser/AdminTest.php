<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Login;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_admin_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                    ->assertSee('LOGIN')
                    ->type('email', 'craig219@comcast.net')
                    ->type('password', 'UPsidedown666!')
                    ->press('Login')
                    ->assertSee('ADMIN')
                    ->click('@admin-link')
                    ->assertSee('Dashboard');
        });
    }
}
