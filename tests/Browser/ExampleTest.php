<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use withFaker;

    public function testExample()
    {
        $this->browse(function (Browser $navegador) {
            $navegador
                ->visit('/')
                ->assertSee('Laravel')
                ->clickLink('Log in')
                ->type('email', 'nuwanda555@gmail.com')
                ->type('password', 'csas1234')
                ->press('LOG IN')
                ->visit('/centros')
                ->screenshot('pantalla1')
                ->assertSee('Centros')
                ->clickLink('+ Insertar')
                //número aleatorio entre 1000 y 99999
                ->type('Codigo', $this->faker->randomNumber(5))
                ->type('Denominacion', $this->faker->name)
                ->type('Direccion', $this->faker->address)
                ->type('Localidad', $this->faker->city)
                ->press('Insertar')
                ->pause(5000);
        });
    }
}
