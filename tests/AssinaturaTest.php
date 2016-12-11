<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssinaturaTest extends TestCase
{

    public function testAssina()
    {
        $this->visit(route('assinatura.create'))
             ->assertResponseOk();
        $assinatura = factory(\App\Assinatura::class)->make()->toArray();

        $this->post(route('assinatura.store'), $assinatura);
        $this->followRedirects()
             ->see($assinatura['nome']);
    }

    public function testListaAssinaturas()
    {
        $this->visit(route('assinatura.index'))
             ->see(\App\Assinatura::first()->nome)
             ->assertResponseOk();
    }
}
