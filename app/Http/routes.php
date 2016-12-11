<?php

use App\Assinatura;

Route::get('/', function () {
  // TODO: pagination
  return view('manifesto.index')->with([
    'total_count' => count(Assinatura::all()),
    'assinaturas' => Assinatura::all(),
  ]);
});

Route::resource('assinatura', 'AssinaturaController', [
    'except' => [
        'destroy',
        'edit',
        'update',
    ]
]);
