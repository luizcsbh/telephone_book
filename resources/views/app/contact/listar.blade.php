@extends('app.layouts.basico')

@section('titulo', 'Contact')
    
@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Contato - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.contact.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.contact')}}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            <table class="table table-striped" border="1" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->age }}</td>
                           
                            <td><a href="{{ route('app.contact.excluir', $contact->id )}}"><i class="fa-solid fa-trash"></i></a></td>
                            <td><a href="{{ route('app.contact.editar', $contact->id )}}"><i class="fa-solid fa-pen"></i></a></td>
                        </tr>
                        <tr>
                           <td colspan="6">
                                <b>Lista de telefones</b>
                                <table border="1" style="margin:20px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Telefone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contact->phones as $key => $phone)
                                            <tr>
                                                <td>{{ $phone->id }}</td>
                                                <td>{{ $phone->number }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>   
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $contacts->appends($request)->links() }}
            <br>
           
        </div>
    </div>
</div>

@endsection