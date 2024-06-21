<?php

use App\SiteContato;
use Illuminate\Database\Seeder;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->name = 'Sistema SG';
        $contato->telefone = '(51) 9999-8877';
        $contato->email = 'contatto@sg.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'contato aberto';
        $contato->save();*/
        factory(SiteContato::class, 100)->create();
    }
}
