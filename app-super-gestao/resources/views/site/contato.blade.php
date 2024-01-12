@extends('site.layouts.basico');

@section('titulo', 'Contato');

@section('conteudo')
    <div class="topo">
        <div class="logo">
            <img src=" {{ asset('img/logo.png') }} ">
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('site.index') }}">Principal</a></li>
                <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                <li><a href="{{ route('site.contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>
        @if ($errors->any())
            <div style="width: 100%;  background:rgb(247, 167, 167); margin-top:15px">
                @foreach ($errors->all() as $erro)
                    {{ $erro }}
                    <br>
                @endforeach
            </div>
        @endif
        <div class="informacao-pagina-2">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato')
                @endcomponent
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
