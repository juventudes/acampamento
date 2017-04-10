@extends('layouts.default')

@section('opengraph')
  <title>[{{ strtoupper($uf) }}] Inscrições</title>
@endsection

<?php
function formata_tel($numero){
  $numero = substr_replace($numero, '(', 0, 0);
  $numero = substr_replace($numero, ') ', 3, 0);
  $numero = substr_replace($numero, '-', -4, 0);
  return $numero;
}
?>

@section('content')
  <section class="bg-white black">
    <div class="p2">
      <table class="registrations">
        <thead>
          <tr>
            <td>#</td>
            <td>Nome</td>
            <td>Nome registro</td>
            <td>Nascimento</td>
            <td>RG</td>
            <td>Estudo/Trabalho</td>
            <td>Cidade</td>
            <td>E-mail</td>
            <td>Telefone</td>
            <td><acronym title="Restrição alimentar">R</acronym></td>
            <td><acronym title="Precisa de creche">C</acronym></td>
            <td><acronym title="Pagamento efetuado">P</td>
            <td>Observações</td>
          </tr>
        </thead>
        <tbody>
        <?php $count = 0; ?>
        @foreach ($users as $user)
          <tr>
            <td>{{ ++$count }}</td>
            <td>
              {{ $user->nome }}<br />
            </td>
            <td>
              <small>{{ $user->nome_r }}</small>
            </td>
            <td>{{ date("d/m/Y", strtotime($user->dob)) }}</td>
            <td style="white-space: nowrap;">{{ $user->rg }}</td>
            <td>{{ $user->estudo_trabalho }}</td>
            <td>{{ $user->cidade }}</td>
            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
            <td style="white-space: nowrap;"><a href="tel:+55{{ $user->telefone }}">{{ formata_tel($user->telefone) }}</a></td>
            <td>{{ $user->restricao ? "✔" : "✖" }}</td>
            <td>{{ $user->creche ? "✔" : "✖" }}</td>
            <td><a href="/registration/code/{{ $user->code }}/">{{ $user->pago ? "✔" : "✖" }}</a></td>
            <td><small>{{ $user->obs }}</small></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection
