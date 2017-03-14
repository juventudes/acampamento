<?php

namespace App\Http\Controllers;

//use App\Registration; TODO
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
  public function __construct() {
    $this->estados = [
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
    $this->precos = [
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
  }

  public function form_validate() {
    // TODO: validation
    return [
    ];
  }

  // Part 1
  public function index() {
    return view('registration.index');
  }

  // Part 2
  public function uf($uf) {
    if (!isset($this->estados[$uf])) {
      abort(404);
    }
    return view('registration.form')->with([
      'uf' => $uf,
      'nome_uf' => $this->estados[$uf],
      'preco' => $this->precos[$uf],
    ]);
  }

  // Transition 2--3
  public function store(Request $request) {
    $telefone = ((object) $request->all())->telefone;
    $telefone = preg_replace('/[^0-9]/', '', $telefone);
    $request->merge(array('telefone' => $telefone));

    // TODO: get code from pagseguro

    $validator = Validator::make($request->all(), self::form_validate());
    if ($validator->fails()){
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }

    $registration = new Registration();
    $registration->fill($request->all());
    if ($registration->save()) {
      return redirect("/registration/code/" . $registration->code);
    }

    abort(500);
    return null;
  }

  // Parts 3, 4
  public function code($code) {
    // TODO: use code, 404 if code does not exist, go to registration.done if payment is done
    return view('registration.payment')->with([
      'user_name' => 'Tiago Madeira',
      'user_city' => 'Itajaí',
      'user_uf' => 'SC',
      'price' => 50,
      'code' => $code,
    ]);
  }
}
