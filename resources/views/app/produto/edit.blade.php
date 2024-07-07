@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>

        </div>
        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                    <input type="hidden" name="id" value="{{ $produto->id ?? '' }}" >
                    @csrf
                    @method('PUT')
                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                        <p style="color:#ff0000">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</p>
                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descricao" class="borda-preta">
                        <p style="color:#ff0000">{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</p>
                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                        <p style="color:#ff0000">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</p>
                    <select name="unidade_id">
                        <option>--Selecione a Unidade de Medida--</option>
                        @foreach ( $unidades as $unidade )
                            <option value="{{$unidade->id}}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>    
                        @endforeach
                    </select>    
                    <p style="color:#ff0000">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</p>    
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        
        
        </div>

    </div>
@endsection