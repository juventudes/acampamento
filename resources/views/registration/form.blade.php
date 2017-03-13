@extends('layouts.default')

<?php
$title = trans('registration.title') . " (" . $nome_uf . ")";

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
        <h1>Inscrição (<?php echo $nome_uf; ?>)</h1>

        <p>A juventude em luta do Brasil e do mundo vai organizar a indignação, potencializar a resistência e construir a esperança no Acampamento (Inter)Nacional das Juventudes em Luta! Para se inscrever é só ler com atenção e preencher o formulário abaixo.</p>

        <p>Nosso Acampamento é construído coletivamente e auto-financiado. Não recebemos dinheiro de nenhuma empresa ou partido, por isso cobramos o valor de <strong>R$ <?php echo number_format($preco, 2, ',', '.'); ?></strong> para a inscrição, incluindo hospedagem e alimentação. Se você não puder pagar esse preço, não se preocupe: informe nas observações e nós entraremos em contato.</p>

        <p>Para informação sobre transporte e caravanas, entre em contato conosco por meio do e-mail <a href="mailto:juntos@juntos.org.br" class="yellow">juntos@juntos.org.br</a>.</p>

        @if ($errors)
          <span class="error">{{$errors->first()}}</span>
        @endif

        <form action="/{{ Config::get('app.locale') }}/assinatura/" method="post">
          {!! csrf_field() !!}

          <fieldset>
            <ul>
              <li>
                <label for="campo-nome">Nome (social)</label>
                <input type="text" name="nome" id="campo-nome" required="required" placeholder="Nome (social)" />
              </li>
              <li>
                <label for="campo-registro">Nome de registro*</label>
                <input type="text" name="nome" id="campo-registro" placeholder="Nome de registro" /> <small>* Caso seu nome social seja diferente do seu nome de registro, preencha esse campo com seu nome de registro. Ele não será divulgado, mas é necessário para a parte burocrática.</small>
              </li>
              <li>
                <label for="campo-dob">Data de nascimento</label>
                <input type="text" class="date" name="dob" id="campo-dob" required="required" placeholder="Data de nascimento" />
              </li>
              <li>
                <label for="campo-rg">RG</label>
                <input type="text" name="rg" id="campo-rg" required="required" placeholder="RG" />
              </li>
              <li>
                <label for="campo-local">Cidade</label>
                <input type="text" name="local" id="campo-cidade" required="required" placeholder="Cidade" />
              </li>
              <li>
                <label for="campo-telefone">{{ trans('fields.telefone') }}</label>
                <input type="text" class="phone" name="telefone" id="campo-telefone" placeholder="Telefone (WhatsApp, se tiver)" />
              </li>
              <li>
                <label for="campo-email">{{ trans('fields.email') }}</label>
                <input type="email" name="email" id="campo-email" placeholder="E-mail" />
              </li>
              <li>
                <label for="campo-local-politico">Local de estudo ou trabalho</label>
                <input type="text" name="local_politico" id="campo-local-politico" required="required" placeholder="Local de estudo ou trabalho" />
              </li>
              <li>
                <label>Possui alguma restrição alimentar?</label>
                <label><input type="radio" name="restricao" value="sim" /> Sim (informe qual nas observações abaixo)</label>
                <label><input type="radio" name="restricao" value="nao" /> Não</label>
              </li>
              <li>
                <label>Precisa de creche?</label>
                <label><input type="radio" name="creche" value="sim" /> Sim</label>
                <label><input type="radio" name="creche" value="nao" /> Não</label>
              </li>
              <li>
                <label for="observacoes">Observações</label>
                <textarea id="observacoes" rows="5" placeholder="Por exemplo, restrições alimentares, comentários ou dúvidas."></textarea>
              </li>
            </ul>

            <div><button type="submit" class="bg-yellow">Enviar</button></div>
          </fieldset>
        </form>
      </div>
    </section>
@endsection
