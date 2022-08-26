@extends('app.layouts.basico')

@section('titulo', 'Contact')
    
@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Contato</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.contact.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.contact')}}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <form method="POST" action="{{ route('app.contact.listar')}}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" class="borda-preta">
                </div>
                <div class="form-group">
                    <input type="number" name="age" placeholder="Idade" class="borda-preta">
                </div>
                
                
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
        </div>
    </div>
</div>

@endsection