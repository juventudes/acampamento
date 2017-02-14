<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
  <link rel="icon" sizes="192x192" href="{{ asset('media/favicon.png') }}" />
  <link rel="me" href="https://twitter.com/_juntos" />
  <script type="text/javascript" src="{{ elixir('js/bundle.js') }}"></script>
  @yield('opengraph')
  <meta property="og:site_name" content="Acampamento Internacional" />
  <meta name="author" content="Juntos" />
  <meta property="article:author" content="https://facebook.com/juventudeemluta/" />
</head>

<body>
  <header class="hero relative overflow-hidden bg-black white" style="background: url('{{ asset('media/hero-cover.jpg') }}') no-repeat top right / cover;">
    <video class="hero-video absolute bottom-0" autoplay="autoplay" loop="loop" poster="{{ asset('media/hero-cover.jpg') }}">
      <source src="{{ asset('media/hero-video.mp4') }}" type="video/mp4" />
    </video>

    <div class="absolute bottom-0 left-0 right-0 top-0" style="background: rgba(0, 0, 0, 0.5);">
      <div class="table" style="width: 100%; height: 100%;">
        <div class="table-cell align-middle center px2">
          <h1 class="hero-logo">
            <a href="/{{ Config::get('app.locale') }}/">
              <img alt="{{ trans('msg.camp_title') }}" src="{{ asset('media/logo-white.png') }}" style="max-height: 320px;" />
            </a>
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
            $path = Request::path();
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

  <nav>
    <div class="max-width-3 mx-auto px1">
      <ul>
        <li><a href="/{{ Config::get('app.locale') }}/" class="px1 py1">{{ trans('menu.manifest') }}</a></li>
        <li><a href="/{{ Config::get('app.locale') }}/schedule/" class="px1 py1">{{ trans('menu.schedule') }}</a></li>
      </ul>
    </div>
  </nav>

  @yield('content')

  <footer class="bg-navy white">
    <div class="max-width-3 mx-auto p2 h6 center">
      {!! trans('msg.footer_html') !!}
    </div>
  </footer>
</body>

</html>
