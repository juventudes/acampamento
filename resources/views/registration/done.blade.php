@extends('layouts.default')

<?php
$title = $user_name . ' &mdash; ' . trans('registration.done_title');

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
      <div class="max-width-3 mx-auto p2">
        <h2>{{ trans('registration.done_title') }}</h2>

        <p><strong>Pronto, {{ $user_name }}.</strong> Você já se inscreveu e pagou sua inscrição que vai financiar todas as nossas atividades, sua hospedagem e alimentação.</p>

        <p>Te esperamos dos dias 13 a 16 de abril no Acampamento (Inter)Nacional das Juventudes em Luta &mdash; que será na Avenida Barão de Tefé, 75, Saúde &mdash; pra compartilhar ideias, experiências e mostrar para os poderosos que aqui há disposição pra lutar! A esperança vai vencer o medo!</p>

        <p>Confira a <a href="/{{ Config::get('app.locale') }}/schedule/" class="yellow">programação</a> e fique atento às próximas circulares e novidades no site e no <a href="https://www.facebook.com/events/1558832057479580/" class="yellow">evento no Facebook</a>.</p>

        <p>Para informação sobre transporte e caravanas ou qualquer dúvida, entre em contato pelo e-mail <a href="mailto:juntos@juntos.org.br" class="yellow">juntos@juntos.org.br</a>.</p>
      </div>
    </section>
@endsection
