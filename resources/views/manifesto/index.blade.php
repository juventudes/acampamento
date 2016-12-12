@extends('layouts.default')

@section('content')
  <main>
    <div class="max-width-3 mx-auto p2">
      <h1 style="line-height: 1.15em;">{{ trans('manifesto.title') }}</h1>

      {!! trans('manifesto.html') !!}
    </div>
  </main>

  <section class="bg-maroon white">
    <div class="max-width-3 mx-auto p2">
      <h2>{{ trans('msg.join_us') }}</h2>

      @if ($errors)
        <span class="error">{{$errors->first()}}</span>
      @endif

      <form action="{{ route('assinatura.store') }}" method="post">
        {!! csrf_field() !!}

        <fieldset>
          <ul>
            <li>
              <label for="campo-nome">{{ trans('fields.nome') }}</label>
              <input type="text" name="nome" id="campo-nome" required="required" />
            </li>
            <li>
              <label for="campo-local-politico">{{ trans('fields.local_politico') }} (<em>{{ trans('fields.local_politico_d') }}</em>)</label>
              <input type="text" name="local_politico" id="campo-local-politico" required="required" />
            </li>
            <li>
              <label for="campo-telefone">{{ trans('fields.telefone') }}</label>
              <input type="tel" name="telefone" id="campo-telefone" />
            </li>
            <li>
              <label for="campo-email">{{ trans('fields.email') }}</label>
              <input type="email" name="email" id="campo-email" />
            </li>
            <li>
              <label for="campo-local">{{ trans('fields.local') }}</label>
              <input type="text" name="local" id="campo-local" required="required" />
            </li>
          </ul>

          <div><button type="submit" class="bg-yellow">{{ trans('msg.enviar') }}</button></div>
        </fieldset>
      </form>
    </div>
  </section>

  <section class="bg-teal">
    <div class="max-width-3 mx-auto p2">
      <h2>{{ trans('msg.signature_count', ['count' => $total_count]) }}</h2>

      <ol>
        @foreach ($assinaturas as $assinatura)
          <li>
            {{ $assinatura->nome }},
            <small>{{ $assinatura->local_politico }}</small>
          </li>
        @endforeach
      </ol>

      <!-- TODO: pagination -->
    </div>
  </section>
@endsection
