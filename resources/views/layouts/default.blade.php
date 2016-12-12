<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

<head>
  <meta charset="utf-8" />
  <title>{{ trans('msg.camp_title') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
</head>

<body>
  <header class="hero relative overflow-hidden bg-black white" style="background: url('{{ asset('media/hero-cover.jpg') }}') no-repeat top right / cover;">
    <video class="hero-video absolute bottom-0" autoplay="autoplay" loop="loop" poster="{{ asset('media/hero-cover.jpg') }}">
      <source src="{{ asset('media/hero-video.mp4') }}" type="video/mp4" />
    </video>

    <div class="absolute bottom-0 left-0 right-0 top-0" style="background: rgba(0, 0, 0, 0.5);">
      <div class="table" style="width: 100%; height: 100%;">
        <div class="table-cell align-middle center px2 py4">
          <h1 class="hero-logo">
            <img alt="{{ trans('msg.camp_title') }}" src="{{ asset('media/logo-white.png') }}" style="max-height: 320px;" />
          </h1>

          <h2 class="h4 sans" style="text-transform: uppercase;">
            Rio de Janeiro
            <a href="//juntos.org.br/" title="Juntos!"><img src="{{ asset('/media/logo-juntos.png') }}" style="margin: 0 10px; vertical-align: middle; width: 50px;" alt="&bull;" /></a>
            {{ trans('msg.camp_date') }}
          </h2>
        </div>
      </div>
    </div>

    <div class="lang-switch max-width-3 mx-auto">
      <div class="absolute top-0 right-0 h6">
        <?php global $J_LOCALES, $J_LOCALE; ?>
        @foreach ($J_LOCALES as $prefix => $lang)
          @if ($prefix != $J_LOCALE)
            <?php
            $path = Route::getCurrentRoute()->getPath();
            if ($path[0] != '/') {
              $path = "/$path";
            }
            ?>
            <a href="/{{ $prefix . $path }}" lang="{{$prefix}}">{{$lang}}</a>
          @endif
        @endforeach
      </div>
    </div>
  </header>

  @yield('content')

  <footer class="bg-navy white">
    <div class="max-width-3 mx-auto p2 h6 center">
      Em breve este site vai ter mais informações sobre o Acampamento Internacional das Juventudes em Luta.<br />
      Dúvidas? Para <strong>entrar em contato</strong>, envie um e-mail para <a href="mailto:juntos@juntos.org.br">juntos@juntos.org.br</a>.
    </div>
  </footer>
</body>

</html>
