@extends('layouts.default')

<?php
$title = trans('registration.payment_title');

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
        <p><strong><?php echo $user_name; ?>, que bom poder contar contigo na construção dessa alternativa contra os poderosos!</strong></p>

        <p>A primeira parte de sua inscrição já foi efetuada. A segunda e última parte é o pagamento. Como nosso acampamento é auto-financiado e não conta com dinheiro de nenhuma empresa ou partido, precisamos da sua contribuição também nessa parte.</p>

        <p>O dinheiro será utilizado para a viabilização da estrutura: aluguel do local para acamparmos com segurança, as refeições que serão servidas ao longo dos dias, a infra-estrutura para a cobertura e viabilidade das oficinas, mesas de debate e até mesmo a festa.</p>

        <p>Temos algumas formas de pagamento para facilitar a sua vinda. Clique no botão abaixo para fazer seu pagamento. Qualquer problema, entre em contato por meio do e-mail <a href="mailto:juntos@juntos.org.br" class="yellow">juntos@juntos.org.br</a>.</p>
      </div>
    </section>

    <section class="bg-teal">
      <div class="max-width-3 mx-auto p2">
        <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

        <script type="text/javascript">
        var code = '<?php echo $code; ?>';

        var openLightbox = function() {
          var isOpenLightbox = PagSeguroLightbox(
            {code: code},
            {
              success : function(transactionCode) {
                console.log("success - " + transactionCode);
              },
              abort : function() {
                console.log("abort");
              }
            }
          );

          if (!isOpenLightbox) {
            location.href = "https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=" + code;
          }
        };
        </script>

        <h2>Efetue o pagamento para confirmar a inscrição</h2>

        <p>
          Inscrição no <strong>Acampamento (Inter)Nacional das Juventudes em Luta</strong><br />
          Participante: <strong><?php echo $user_name; ?></strong> (<?php echo $user_city; ?>, <?php echo $user_uf; ?>)<br />
          Valor: <strong>R$ <?php echo number_format($price, 2, ',', '.'); ?></strong>
        </p>

        <button onclick="openLightbox()" class="bg-yellow">
          Fazer pagamento
        </button>

        <p><small>PS: Para informação sobre transporte e caravanas, entre em contato conosco por meio do e-mail <a href="mailto:juntos@juntos.org.br" class="black">juntos@juntos.org.br</a>.</small></p>
      </div>
    </section>
@endsection
