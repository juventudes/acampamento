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
