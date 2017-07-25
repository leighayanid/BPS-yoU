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
                    ->type('email', 'leighdinaya04@gmail.com')
                    ->type('password', 'leighleigh')
                    ->press('Login')
                    ->pause(3000)
                    ->assertPathIs('/');
        });

        $this->logout();
    }

    /*
        logout user
    */
     public function logout(){
        dump('logout');
        $this->browse(function (Browser $browser){
            $browser->visit('/threads')
                ->click('#menu')
                ->click('#logout')
                ->pause(2000);
        });
    }
}
