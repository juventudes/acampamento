@extends('layouts.default')

@section('content')
    <section>
        <h1>Convide pessoas para o acampamento!</h1>
        @if($errors)
            <span class="error">{{$errors->first()}}</span>
        @endif

        <form action="{{ route('assinatura.store') }}" method="post">
            {!! csrf_field() !!}
            <div>
                <label for="campo-nome">{{ trans('fields.nome') }}</label>
                <input type="text" name="nome" id="campo-nome" required>
            </div>

            <div>
                <label for="campo-email">{{ trans('fields.email') }}</label>
                <input type="email" name="email" id="campo-email" required>
            </div>

            <div>
                <label for="campo-telefone">{{ trans('fields.telefone') }}</label>
                <input type="tel" name="telefone" id="campo-telefone" required>
            </div>

            <div>
                <label for="campo-local">{{ trans('fields.local') }}</label>
                <input type="text" name="local" id="campo-local" required>
            </div>

            <div>
                <label for="campo-local-politico">{{ trans('fields.local_politico') }}</label>
                <span><em>({{ trans('fields.local_politico_d') }})</em></span>
                <input type="text" name="local_politico" id="campo-local" required>
            </div>

            <button type="submit">{{ trans('msg.enviar') }}</button>

        </form>
    </section>
@endsection
