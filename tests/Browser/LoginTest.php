<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        dump('testLoginPage');
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->value('#email', 'leighdinaya04@gmail.com')
                    ->value('#password', 'leighleigh')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/threads');
        });
    }
}
