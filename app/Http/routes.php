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

Route::group(['prefix' => 'registration'], function() {
  // Part 1
  Route::get('/', 'RegistrationController@index');

  // Part 2
  Route::get('/uf/{uf}', 'RegistrationController@uf');

  // Transition 2--3
  Route::post('/store', 'RegistrationController@store');

  // Parts 3, 4
  Route::get('/code/{code}', 'RegistrationController@code');

  // Transition 3--4
  Route::post('/payment_notification', 'RegistrationController@notification');
});
