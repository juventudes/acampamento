<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
</head>

<body>
  <header class="hero relative overflow-hidden bg-orange white">
    <video class="hero-video absolute top-0" autoplay="autoplay" loop="loop" poster="">
      <source src="" type="video/mp4" />
    </video>

    <div class="absolute bottom-0 left-0 right-0 top-0">
      <div class="table" style="width: 100%; height: 100%;">
        <div class="table-cell align-middle center px2 py4">
          <h1 class="hero-logo">
            <img alt="Acampamento (inter)nacional das juventudes em luta" src="{{ asset('media/logo-white.png') }}" style="max-height: 320px;" />
          </h1>
        </div>
      </div>
    </div>
  </header>

  @yield('content')

  <footer class="bg-navy white">
    <div class="max-width-3 mx-auto p2 h6 center">
      Em breve este site vai ter mais informações sobre o Acampamento (inter)nacional das juventudes em luta.<br />
      Dúvidas? Para <strong>entrar em contato</strong>, envie um e-mail para <a href="mailto:juntos@juntos.org.br">juntos@juntos.org.br</a>.
    </div>
  </footer>
</body>

</html>
