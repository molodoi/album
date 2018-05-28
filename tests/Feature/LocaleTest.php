<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocaleTest extends TestCase
{
    /**
     * Locale test.
     *
     * @return void
     */
    public function testLocale()
    {
        // fr
        $this->get('/language/fr');
        $this->get('/')
            ->assertSee('Connexion');

        // en
        $this->get('/language/en');
        $this->get('/')
            ->assertSee('Login');
    }
}
