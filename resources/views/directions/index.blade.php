@extends('layouts.default')

<?php
$title = trans('directions.title');

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
      <h1 style="line-height: 1.15em;">{{ trans('directions.title') }}</h1>

      <div class="share-buttons">
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ trans('manifesto.title') }}" data-size="large"></a>
        <div class="fb-share-button" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"></a></div>
      </div>

      {!! trans('directions.text') !!}

      <h2>{{ trans('directions.map') }}</h2>

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.4685620351706!2d-43.18904224834518!3d-22.896082084943586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997f445429b2fb%3A0x2c0fd11e71474e08!2zQXNzb2NpYcOnw6NvIGRvIENvbWl0w6ogUmlvIGRhIEHDp8OjbyBkYSBDaWRhZGFuaWE!5e0!3m2!1sen!2sbr!4v1491789942401" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

      <h2>{{ trans('directions.photos') }}</h2>

      <p>
        <a href="{{ asset('/media/fora.jpg') }}"><img src="{{ asset('/media/fora.jpg') }}" width="49.5%" style="margin-right: 1%;" /></a><a href="{{ asset('/media/dentro.jpg') }}"><img src="{{ asset('/media/dentro.jpg') }}" width="49.5%" /></a>
      </p>
    </div>
  </main>
@endsection
