<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        $regras = [
            'name' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedback = [
            'name.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'name.max' => 'O campo nome precisa ter no maximo 40 caracteres',
            'name.unique' => 'O nome informado ja esta em uso',

            'email.email' => 'O email informado nao é válido',
            'mensagem.max' => 'Amensagem deve ter no maximo 2000 caractres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];
    
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');

      

        //return view('site.contato');
    }

}
