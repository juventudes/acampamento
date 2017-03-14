<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <title>Efetue o pagamento para confirmar sua inscrição</title>
</head>

<body>
  <p>Olá, {{$nome}}!</p>

  <p>A primeira parte de sua inscrição já foi efetuada! A segunda e última parte é o pagamento. Como nosso acampamento é auto-financiado e não conta com dinheiro de nenhuma empresa, precisamos da sua contribuição também nessa parte.</p>

  <p>O valor da inscrição é <strong>R$ {{ number_format($preco, 2, ",", ".") }}</strong>. Clique no link para efetuar seu pagamento:</p>

  <p><a href="{{ $link }}">{{ $link }}</a></p>

  <p>O dinheiro será utilizado para a viabilização da estrutura: aluguel do local para acamparmos com segurança, as refeições que serão servidas ao longo dos dias, a infra-estrutura para a cobertura e viabilidade das oficinas, mesas de debate e até mesmo a festa.</p>

  <p>Teremos algumas formas de pagamento para facilitar a sua vinda. Siga as <a href="{{ $link }}">instruções no site</a> para fortalecer a construção do nosso encontro em abril.</p>

  <p>Para animar ainda mais e já ir aquecendo a nossa mobilização, dá uma olhada na programação e anote na agenda: <a href="https://acampamento.juntos.org.br/schedule/">acampamento.juntos.org.br/schedule</a></p>

  <p>Qualquer dúvida, estamos a disposição.</p>

  <p>Um abraço,<br />
  Comissão do Acampamento (Inter)Nacional das Juventudes em Luta</p>

  <p>PS: Para informação sobre transporte e caravanas, entre em contato conosco por meio do e-mail <a href="mailto:juntos@juntos.org.br">juntos@juntos.org.br</a>.</p>

  <p><a href="https://juntos.org.br/"><img style="max-width: 80px;" src="https://acampamento.juntos.org.br/media/favicon.png" /></a></p>
</body>
</html>
