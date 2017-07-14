<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
                    ->assertSee('Name')
                    ->assertSee('Username')
                    ->assertSee('E-Mail Address')
                    ->assertSee('Password')
                    ->value('#name', 'Leigh Dinaya')
                    ->value('#username', 'leighayanid')
                    ->value('#email', 'leighdinaya04@gmail.com')
                    ->value('#password', 'leighleigh')
                    ->value('#password-confirm', 'leighleigh')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/threads');
        });
    }
}
