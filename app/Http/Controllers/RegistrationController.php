<?php

namespace App\Http\Controllers;

use App\Registration;
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
    return [
      'nome' => 'required|between:2,250',
      'dob' => 'required|date',
      'rg' => 'required|between:2,30',
      'cidade' => 'required|between:2,250',
      'telefone' => 'digits_between:10,11',
      'email' => 'required|email|unique:registrations',
      'restricao' => 'required|boolean',
      'creche' => 'required|boolean',
    ];
  }

  public function get_pagseguro_code($price) {
    \PagSeguro\Library::initialize();
    if (\App::environment('production')) {
      \PagSeguro\Configuration\Configure::setEnvironment('production');
    } else {
      \PagSeguro\Configuration\Configure::setEnvironment('sandbox');
    }
    \PagSeguro\Configuration\Configure::setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));

    \PagSeguro\Configuration\Configure::setCharset('UTF-8');

    try {
      $sessionCode = \PagSeguro\Services\Session::create(\PagSeguro\Configuration\Configure::getAccountCredentials());
    } catch (Exception $e) {
      die("Erro fatal: " . $e->getMessage());
    }

    $payment = new \PagSeguro\Domains\Requests\Payment();
    $payment->addItems()->withParameters('0001', 'Inscricao no Acampamento Internacional das Juventudes em Luta', 1, number_format($price, 2, '.', ''));
    $payment->setCurrency("BRL");

    try {
      $result = $payment->register(\PagSeguro\Configuration\Configure::getAccountCredentials(), true);
      return $result->getCode();
    } catch (Exception $e) {
      die($e->getMessage());
    }
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
    if (!isset($this->precos[$request->uf])) {
      die("Erro fatal: Estado nao existe.");
    }

    $telefone = ((object) $request->all())->telefone;
    $telefone = preg_replace('/[^0-9]/', '', $telefone);

    $dob = ((object) $request->all())->dob;
    list($d, $m, $y) = explode("/", $dob);
    $dob = sprintf("%04d-%02d-%02d", $y, $m, $d);

    $request->merge(array('telefone' => $telefone, 'dob' => $dob));

    $validator = Validator::make($request->all(), self::form_validate());
    if ($validator->fails()){
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }

    $code = $this->get_pagseguro_code($this->precos[$request->uf]);
    if (!$code) {
      // TODO: mail admin
      return redirect()
        ->back()
        ->withErrors(['message' => 'Erro ao gerar código de pagamento. Isso não deveria acontecer. Entre em contato com <a href="mailto:juntos@juntos.org.br">juntos@juntos.org.br</a>.'])
        ->withInput();
    }
    $request->merge(array('code' => $code));

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
    $registration = Registration::where('code', $code)->firstOrFail();

    if ($registration->pago) {
      return view('registration.done')->with([
        'user_name' => $registration->nome
      ]);
    } else {
      return view('registration.payment')->with([
        'user_name' => $registration->nome,
        'user_city' => $registration->cidade,
        'user_uf' => $registration->uf,
        'price' => $this->precos[$registration->uf],
        'code' => $code,
      ]);
    }
  }

  // TODO: pagseguro redirect URL, notification URL
}
