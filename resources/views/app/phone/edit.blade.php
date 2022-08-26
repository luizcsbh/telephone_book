@extends('app.layouts.basico')

@section('titulo', 'Phone')
    
@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar - Telefone</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.phone') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            @component('app.phone._components.form_create_edit', ['phone' => $phone,  'contacts' => $contacts])
            @endcomponent
        </div>
    </div>
</div>

@endsection