@extends('layouts.default')

<?php
$title = trans('schedule.title');

$path = Request::path();
if ($path[0] != '/') {
  $path = "/$path";
}
$canonical = 'https://acampamento.juntos.org.br/' . Config::get('app.locale') . $path;
?>

@section('opengraph')
  <title>{{ $title }}</title>
  <meta name="description" content="{{ trans('msg.camp_description') }}" />
  <meta rel="canonical" href="{{ $canonical }}" />
  <meta property="og:url" content="{{ $canonical }}" />
  <meta property="og:title" content="{{ $title }}" />
  <meta property="og:description" content="{{ trans('msg.camp_description') }}" />
  <meta property="og:image" content="{{ asset('media/og-image.jpg') }}" />
  <meta property="og:image:secure_url" content="{{ asset('media/og-image.jpg') }}" />
  <meta property="og:image:width" content="1258" />
  <meta property="og:image:height" content="555" />
  <meta property="og:type" content="website" />
@endsection

@section('content')
  <main class="schedule">
    <div class="max-width-3 mx-auto p2">
      <h1 style="line-height: 1.15em;">{{ trans('menu.schedule') }}</h1>

      <div class="share-buttons">
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ trans('manifesto.title') }}" data-size="large"></a>
        <div class="fb-share-button" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"></a></div>
      </div>

      {!! trans('schedule.html') !!}
    </div>
  </main>

  <section class="bg-maroon white">
    <div class="max-width-3 mx-auto p2">
      <h2>{{ trans('msg.join_us') }}</h2>

      <p>{{ trans('msg.join_us_d') }}</p>

      @if ($errors)
        <span class="error">{{$errors->first()}}</span>
      @endif

      <form action="/{{ Config::get('app.locale') }}/assinatura/" method="post">
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
              <input type="text" class="phone" name="telefone" id="campo-telefone" />
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
@endsection