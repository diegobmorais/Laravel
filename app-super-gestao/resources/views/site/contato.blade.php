<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - Contato</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ 'css/style.basic.css' }}">
</head>

<body>
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
        <div class="informacao-pagina">
            <div class="contato-principal">

                <form action="{{ route('site.contato') }}" method="post">
                    @csrf
                    <input name="nome" type="text" placeholder="Nome" class="borda-preta">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <br>
                    <input name="telefone" type="text" placeholder="Telefone" class="borda-preta">
                    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
                    <br>
                    <input name="email" type="text" placeholder="E-mail" class="borda-preta">
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <br>
                    <select name="motivo_contato" class="borda-preta">
                        <option value="">Qual o motivo do contato?</option>
                        <option value="1">Dúvida</option>
                        <option value="2">Elogio</option>
                        <option value="3">Reclamação</option>
                    </select>
                    {{$errors->has('motivo_contato') ? $errors->first('motivo_contato') : ''}}
                    <br>
                    <textarea name="mensagem" class="borda-preta" placeholder="Preencha aqui a sua mensagem"></textarea>
                    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
                    <br>
                    <button type="submit" class="borda-preta">ENVIAR</button>
                </form>
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
</body>

</html>
