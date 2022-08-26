@extends('app.layouts.basico')

@section('titulo', 'Telefone')
    
@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Visualizar -Telefone</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.phone') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <table class="table table-striped" >
                <tr>
                    <td>ID:</td>
                    <td>ID Contato</td>
                    <td>Número:</td>

                </tr>
                <tr>
                    <td>{{ $phone->id }}</td>
                    <td>{{ $phone->contact_id }}</td>
                    <td>{{ $phone->number }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection