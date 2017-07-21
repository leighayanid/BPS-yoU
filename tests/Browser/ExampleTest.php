<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomePageTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        dump('testHomePage');
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('BPS-yoU')
                    ->clickLink('Login')
                    ->clickLink('Register')
                    ->visit('/')
                    ->clickLink('Create your account now.')
                    ->visit('/')
                    ->clickLink('Sign in with email')
                    ->visit('/')
                    ->clickLink('Explore');
        });
    }
}
