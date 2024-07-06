<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

use function GuzzleHttp\Promise\all;

class FornecedoresController extends Controller
{
    public function index($msg = ''){
        return view('app.fornecedor.index', ['msg' => $msg]);
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('name', 'like', '%'.$request->input('name').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(3) ;   
        
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';
        if($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'name' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O campo Nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preeencido corretamente'
            ];

            $request->validate($regras, $feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro Realizado com sucesso';
        }

        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            
            if($update){
                $msg = 'Atualização realizada com sucesso';
            }else{
                $msg = 'Erro ao tentar Atualizar o registro';
            }
           
            return redirect()->route('app.fornecedor.editar',['id'=> $request->input('id'), 'msg' => $msg] );
        }

        
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);

    }

    public function excluir($id){
        $fornecedor = Fornecedor::find($id)->delete();
        $msg = '';
        if($fornecedor){
            $msg = 'Exclusão realizada com sucesso';
        }else{
            $msg = 'Erro ao tentar excluir o registro';
        }

        return redirect()->route('app.fornecedor', ['msg' => $msg]);


    }
}
