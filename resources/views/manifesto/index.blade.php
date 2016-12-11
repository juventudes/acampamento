@extends('layouts.default')

@section('content')
  <main>
    <div class="max-width-3 mx-auto p2">
      <h1 style="line-height: 1.15em;">Construa o Acampamento Internacional das Juventudes em Luta</h1>

      <p>O mar da História está agitado! A luta que temos travado contra o governo corrupto de Temer &mdash; e seu pacote de retrocessos &mdash; produziu um dos maiores movimentos estudantis da história do país. As ocupações de escolas e universidades são apenas uma demonstração do que tem sido ao redor do mundo a luta dos que querem contra os que tiram direitos.</p>

      <p>Vivemos sobre o signo de uma crise que se apresenta em diversas dimensões: social, política, moral, ambiental, mas também uma crise de ideias e projetos.</p>

      <p><em>Queremos mais igualdade!</em> A desigualdade chegou ao extremo. O 1% mais rico da população mundial detém mais riquezas do que a soma dos 99% restantes. Essa minoria política e econômica utiliza-se da força do dinheiro e seus privilégios para se manter no poder e manter intocada essa estrutura de desigualdade. Essa casta se mantém também através da corrupção generalizada do Estado, produzindo redes de paraísos fiscais que permitem que os ricaços escondam trilhões de dólares. Nossa alternativa tem que ser dos de baixo contra os do andar de cima.</p>

      <p><em>Queremos estudar!</em> Em toda a parte podemos observar o corte de direitos e serviços públicos em nome do lucro dos grandes bancos. A educação pública vem sendo sucateada ou entregue a grandes corporações que a transformam em uma mercadoria, pautada pela lógica de mercado. No Brasil, Chile e Paraguai tomamos as escolas em nossas mãos em defesa do direito de estudar.</p>

      <p><em>Queremos trabalhar!</em> Uma economia voltada para a especulação e não para o bem estar de uma maioria está nos levando a uma encruzilhada. Milhões de nós perdem seus empregos todos os anos, quando não estamos em postos de trabalho precários. Os jovens, em especial a negritude e as mulheres, são os mais atingidos por esse problema. Não queremos um futuro de incertezas, temos que tomar as rédeas da nossa economia.</p>

      <p><em>Queremos ser livres!</em> Para além de uma democracia política e econômica, queremos ter o direito de ser quem somos! Nossas identidades importam. Somos mulheres, negras e negros, LGBTQs, indígenas etc: não aceitaremos mais sermos tratados como cidadãos de segunda categoria nem tampouco viver com violência. O sistema que explora é o mesmo que nos oprime. Temos que operar uma mudança cultural radical se quisermos construir uma sociabilidade sob outras bases.</p>

      <p><em>Mas há resistência!</em> Das ocupações de escolas e universidades, à resistência juvenil contra Trump, nos levantamos contra os retrocessos. A certeza de que &ldquo;Fue el Estado&rdquo; que nos assassina, leva milhares às ruas &mdash; como o grandioso movimento negro &ldquo;Black Lives Matter&rdquo;, que não abre mão da luta contra o genocídio da juventude negra, e como no México que a juventude luta contra o narcocapitalismo e o assassinato dos 43 estudantes. As Primaveras feministas no Brasil, Peru, Argentina e México pintam de roxo a América Latina e ecoam nosso grito por nem uma a menos. Ocupamos as praças contra retirada de direitos, mas também por uma nova forma de fazer política, como foram as &ldquo;noites de pé&rdquo; ou &ldquo;nuit de bout&rdquo; que passamos na França. Somos, como disseram os espanhóis em 2011, a geração sem direitos, mas também a geração sem medo.</p>

      <p><em>O futuro é agora!</em> Precisamos elaborar um projeto de outro futuro, ainda que tentem nos impor a atual realidade como única possível. Já diria Eduardo Galeano: o velho já morreu, o novo é que ainda não nasceu. E somente <strong>Juntos!</strong>, nós podemos apresentar uma saída para essa imensa crise que se apresenta para a humanidade. Por isso convocamos jovens de todo o mundo para um encontro em 2017 no Rio de Janeiro (Brasil) para dar um primeiro passo na construção dessa alternativa, da qual a juventude e o povo trabalhador seja protagonista. A disputa daqui pra frente não será somente de Trump e Temer versus nós, mas também do medo versus a esperança. E este Acampamento, no coração da Primavera Carioca, será para reafirmar a segunda opção como nossa!</p>
    </div>
  </main>

  <section class="bg-maroon white">
    <div class="max-width-3 mx-auto p2">
      <h2>Junte-se a nós!</h2>

      <!-- TODO: form -->
    </div>
  </section>

  <section class="bg-teal">
    <div class="max-width-3 mx-auto p2">
      <h2>{{ $total_count }} pessoas já assinaram</h2>

      <ol>
        @foreach ($assinaturas as $assinatura)
          <li>
            {{ $assinatura->nome }},
            <small>{{ $assinatura->local_politico }}</small>
          </li>
        @endforeach
      </ol>

      <!-- TODO: pagination -->
    </div>
  </section>
@endsection
