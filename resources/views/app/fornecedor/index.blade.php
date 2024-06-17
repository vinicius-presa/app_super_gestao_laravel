<h3> Fornecedores (view) </h3>

{{-- comentario --}}


{{--@dd($fornecedores)--}}

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3> Existe alguns fornrcedores</h3>
@elseif(count($fornecedores) > 10)
    <h3> Existem varios fornecedores</h3>
@else
    <h3>Não exitem fornecedores</h3>    
@endif

{{--
<ul>
    <li>
        <a href="{{ route('site.index') }}">Principal</a>
    </li>
    <li>
        <a href="{{ route('site.sobrenos') }}">Sobre Nós</a>
    </li>
    <li>
        <a href="{{ route('site.contato') }}">Contato</a>
    </li>
    <li>
        <a href="{{ route('site.login') }}">Login</a>
    </li>
        
    <li>
        <a href="{{ route('app.produtos') }}">Produtos</a>
    </li>
    
    <li>
        <a href="{{ route('app.fornecedores') }}">Fornecedores</a>
    </li>
    <li>
        <a href="{{ route('app.clientes') }}">Clientes</a>
    </li>

</ul>
--}}