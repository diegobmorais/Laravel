@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>
                Adicionar Produto
            </p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Volta</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{route("produto.store")}}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome do produto" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" name="descricao" value="{{ old('descricao') }}" placeholder="Descrição do produto" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

                    <input type="text" name="peso" value="{{ old('peso') }}" placeholder="Peso do produto" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

                    <select name="unidade_id">
                        <option value="" selected>Selecione a unidade de medida</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
