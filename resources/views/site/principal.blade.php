@extends('site.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-destaque">
        <div class="esquerda">
            <div class="informacoes">
                <h1>Agenda Telefônica</h1>
                <p>Software para gestão de contatos.<p>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Sua agenda na nuvem</span>
                </div>
            </div>
        </div>
    </div>
@endsection
