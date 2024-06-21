<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->name = 'Paulo Santos';
        $fornecedor->site = 'paulosantos.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'contato@paulosantos.com';
        $fornecedor->save();
        // metodo creat necessario metodo fillable na clase
        Fornecedor::create([
            'name' => 'Roberto Silva',
            'site' => 'robertosilva.com.br',
            'uf' => 'SP',
            'email' => 'contato@robertosilva'
        ]);
        //insert
        DB::table('fornecedores')->insert([
            'name' => 'Marcio Silveira',
            'site' => 'marciosilveira.com.br',
            'uf' => 'RJ',
            'email' => 'contato@marciosilveira'
        ]);
    }
}
