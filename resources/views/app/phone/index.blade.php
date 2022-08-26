@extends('app.layouts.basico')

@section('titulo', 'Telefone')
    
@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Telefones</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.phone.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            <table class="table" border="1" width="100%">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($phones as $phone)
                        <tr>
                            <td>{{ $phone->number }}</td>
                            <td><a href="{{ route('app.phone.show', $phone->id ) }}"><i class="fa-solid fa-eye"></i></a></td>
                            <td>
                                <form id="form_{{$phone->id}}" method="POST" action="{{ route('app.phone.destroy',$phone->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('app.phone.destroy', $phone->id )}}"><i class="fa-solid fa-trash"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('app.phone.edit', $phone->id) }}"><i class="fa-solid fa-pen"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $phones->appends($request)->links() }}
            <br>
           
        </div>
    </div>
</div>

@endsection