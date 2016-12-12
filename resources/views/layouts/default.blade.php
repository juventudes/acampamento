<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <title>Acampamento Internacional das Juventudes em Luta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
</head>

<body>
  <header class="hero relative overflow-hidden bg-black white" style="background: url('{{ asset('media/hero-frame.jpg') }}') no-repeat top center / cover;">
    <video class="hero-video absolute bottom-0" autoplay="autoplay" loop="loop" poster="{{ asset('media/hero-frame.jpg') }}">
      <source src="{{ asset('media/hero-video.mp4') }}" type="video/mp4" />
    </video>

    <div class="absolute bottom-0 left-0 right-0 top-0" style="background: rgba(0, 0, 0, 0.5);">
      <div class="table" style="width: 100%; height: 100%;">
        <div class="table-cell align-middle center px2 py4">
          <h1 class="hero-logo">
            <img alt="Acampamento (inter)nacional das juventudes em luta" src="{{ asset('media/logo-white.png') }}" style="max-height: 320px;" />
          </h1>

          <h2 class="h4 sans" style="text-transform: uppercase;">Rio de Janeiro &bull; abril de 2017</h2>
        </div>
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
