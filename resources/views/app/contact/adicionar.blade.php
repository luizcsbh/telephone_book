@extends('app.layouts.basico')

@section('titulo', 'Contact')
    
@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Contato - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.contact.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.contact')}}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <form method="POST" action="{{ route('app.contact.adicionar') }}">
                
                <input type="hidden" name="id" value="{{ $contact->id ?? ''}}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" value="{{ $contact->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}        
                </div>
                <div class="form-group">
                    <input type="number" name="age" value="{{  $contact->age ??old('age') }}" placeholder="Idade" class="borda-preta">
                    {{ $errors->has('age') ? $errors->first('age') : '' }}
                </div>
                
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

@endsection