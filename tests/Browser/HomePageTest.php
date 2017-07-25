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
                    ->press('Login')
                    ->press('Register')
                    ->visit('/')
                    ->press('Create your account now.')
                    ->visit('/')
                    ->press('Sign in with email')
                    ->visit('/')
                    ->press('Explore');
        });
    }
}
