@extends('layouts.default')

<?php
$title = $nome_uf . ': Inscrições encerradas';

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
    <section class="bg-maroon white">
      <div class="max-width-3 mx-auto px2 py4">
        <h1>Oops...</h1>

        <p>Infelizmente as inscrições do seu estado ({{ $nome_uf }}) já foram encerradas :-(</p>
      </div>
    </section>
@endsection
