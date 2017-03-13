<?php

use App\Assinatura;

Route::get('/', function () {
  // TODO: pagination
  return view('manifesto.index')->with([
    'total_count' => Assinatura::all()->count(),
    'assinaturas' => Assinatura::orderBy('prioridade', 'desc')
                               ->orderBy('created_at')
                               ->get(),
  ]);
});

Route::get('/schedule', function() {
  return view('schedule.index');
});

Route::resource('assinatura', 'AssinaturaController', [
    'except' => [
        'destroy',
        'edit',
        'update',
    ]
]);

Route::get('/registration', function() {
  return view('registration.index');
});

Route::get('/registration/uf/{uf}', function($uf) {
  $estados = [
    'to' => 'Tocantins',
    'ba' => 'Bahia',
    'se' => 'Sergipe',
    'pe' => 'Pernambuco',
    'al' => 'Alagoas',
    'rn' => 'Rio Grande do Norte',
    'ce' => 'Ceará',
    'pi' => 'Piauí',
    'ma' => 'Maranhão',
    'ap' => 'Amapá',
    'pa' => 'Pará',
    'rr' => 'Roraima',
    'am' => 'Amazonas',
    'ac' => 'Acre',
    'ro' => 'Rondônia',
    'mt' => 'Mato Grosso',
    'ms' => 'Mato Grosso do Sul',
    'go' => 'Goiás',
    'pr' => 'Paraná',
    'sc' => 'Santa Catarina',
    'rs' => 'Rio Grande do Sul',
    'sp' => 'São Paulo',
    'mg' => 'Minas Gerais',
    'rj' => 'Rio de Janeiro',
    'es' => 'Espírito Santo',
    'df' => 'Distrito Federal',
    'pb' => 'Paraíba',
  ];
  $precos = [
    'to' => 50,
    'ba' => 50,
    'se' => 50,
    'pe' => 50,
    'al' => 50,
    'rn' => 50,
    'ce' => 50,
    'pi' => 50,
    'ma' => 50,
    'ap' => 50,
    'pa' => 50,
    'rr' => 50,
    'am' => 50,
    'ac' => 50,
    'ro' => 50,
    'mt' => 50,
    'ms' => 50,
    'go' => 50,
    'pr' => 50,
    'sc' => 50,
    'rs' => 50,
    'sp' => 70,
    'mg' => 70,
    'rj' => 80,
    'es' => 70,
    'df' => 50,
    'pb' => 50,
  ];

  if (!isset($estados[$uf])) {
    abort(404);
  }
  return view('registration.form')->with([
    'uf' => $uf,
    'nome_uf' => $estados[$uf],
    'preco' => $precos[$uf],
  ]);
});
