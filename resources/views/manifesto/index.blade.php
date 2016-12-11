@extends('layouts.default')

@section('content')
  <main>
    <div class="max-width-3 mx-auto p2">
      <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong> Nam faucibus blandit sem, ut molestie odio dapibus non. Sed eleifend sapien at pulvinar mollis. Aliquam faucibus nisi ac pharetra blandit. Cras tincidunt pulvinar imperdiet. Donec id fermentum eros. Mauris pulvinar pretium laoreet. Aliquam vel eleifend libero. Donec aliquam gravida felis vestibulum elementum. Etiam aliquet nisl quam, id rhoncus nulla cursus in. Nulla felis nibh, porta ac mi nec, malesuada convallis nunc.</p>

      <p><strong>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</strong> Nam sollicitudin tortor vitae scelerisque lobortis. Praesent elementum libero id lorem maximus, in laoreet arcu suscipit. Etiam dapibus tortor odio, a laoreet urna laoreet in. Nulla posuere sapien vitae hendrerit pulvinar. Maecenas malesuada hendrerit laoreet. Quisque ultricies, purus mollis eleifend tristique, ante ipsum convallis lacus, a dapibus odio ipsum in est.</p>

      <p><strong>Phasellus vitae faucibus enim.</strong> Phasellus orci risus, posuere vitae semper eget, tempor id massa. Suspendisse ut pharetra libero, in porta justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras placerat, ex vitae tempus aliquam, nunc augue maximus eros, in ultricies lacus nisi dapibus tortor. Integer a urna lorem. Etiam auctor, est vitae venenatis cursus, diam eros condimentum lorem, nec condimentum nibh urna quis diam. Vivamus porttitor condimentum tellus, vitae feugiat ipsum auctor vitae. Aenean faucibus luctus lectus, eu porta lacus rutrum vel. Duis venenatis neque at elit imperdiet placerat. Maecenas ultricies eleifend justo eget blandit. Quisque erat leo, malesuada ut mauris sit amet, auctor iaculis massa.</p>

      <p><strong>Nunc dignissim varius nibh, a faucibus leo lobortis consequat.</strong> Donec scelerisque, turpis eu euismod finibus, urna quam vehicula dui, interdum cursus augue velit nec lectus. Cras congue eros facilisis mi fringilla vestibulum. Ut suscipit luctus pharetra. Etiam auctor, leo ut pulvinar ornare, tellus turpis consequat odio, nec varius eros orci eu quam. Maecenas tempus eget eros sit amet faucibus. Donec fermentum est ut nibh lacinia, non aliquam quam lobortis. Quisque vel ullamcorper nisi, a volutpat ante.</p>

      <p><strong>Etiam congue et libero et maximus.</strong> Ut commodo risus sit amet scelerisque condimentum. Duis bibendum nulla vel lacus varius feugiat. Aliquam leo turpis, maximus nec fringilla in, mollis vel elit. Donec mauris arcu, posuere vitae lacinia ut, varius id neque. Phasellus cursus aliquam metus, sit amet facilisis justo rhoncus a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tristique maximus massa. Donec nec ante in arcu porta imperdiet tristique sed ante. Phasellus scelerisque justo eu est aliquet, sit amet interdum dolor placerat. Integer porta luctus fermentum. Vivamus est dui, ultrices quis neque eget, porta semper urna. Donec sit amet dui eleifend, laoreet tellus vel, tempor tellus. Vestibulum diam enim, suscipit a augue eget, luctus pellentesque arcu.</p>

      <p><strong>Nulla faucibus fringilla velit, non imperdiet dui tempus sed.</strong> Etiam ornare commodo lacus at rutrum. Donec molestie, lectus nec varius finibus, nisl lacus sagittis ligula, nec ornare leo massa sed enim. Sed pharetra placerat augue, ac vehicula sapien. Morbi ultrices dui et bibendum consequat. In quis scelerisque odio. Vestibulum a consequat risus, quis condimentum justo. Cras a nisi ut dolor rutrum mollis. Sed ac turpis vulputate, molestie orci non, tempor dui.</p>

      <p><strong>Phasellus sapien nisl, semper ac urna quis, viverra faucibus tortor.</strong> Fusce vitae lorem sapien. Nam faucibus mauris ipsum. Nullam dignissim fringilla sem quis congue. Quisque non rhoncus nunc. Fusce ut magna sem. Aliquam aliquam tristique nulla sed consequat. Vivamus eget felis eu risus ultricies hendrerit a quis justo.</p>
    </div>
  </main>

  <section class="bg-maroon white">
    <div class="max-width-3 mx-auto p2">
      <h2>Assine o manifesto</h2>

      <!-- TODO: form -->
    </div>
  </section>

  <section class="bg-teal">
    <div class="max-width-3 mx-auto p2">
      <h2>{{ $total_count }} assinaturas</h2>

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
