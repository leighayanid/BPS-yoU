<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * Test the register page 
     * Test values
     * @return void
     */
    public function testRegisterPage()
    {
        dump('testNewUserRegistration');
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Kean Flores')
                ->type('username', 'keanuflores')
                ->type('email', 'keanuflores@gmail.com')
                ->select('#college', 'CICT')
                ->select('#campus', 'Main')
                ->select('#status', 'Student')
                ->type('password', 'passw0RD')
                ->type('password_confirmation', 'passw0RD')
                ->press('Register')
                ->pause(5000)
                ->assertPathIs('/')
                ->assertSee('Kean Flores');
        });

        $this->logout();
    }


    /*
    * logout function
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
