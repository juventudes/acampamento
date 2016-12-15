<?php

namespace App\Http\Controllers;

use App\Assinatura;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AssinaturaController extends Controller
{
    private static function validaAssinaturaRegras()
    {
        return [
            'nome' => 'required|between:2,250',
            'email' => 'required|email|unique:assinaturas',
            'local' => 'required|between:5,250',
            'local_politico' => 'between:3,250',
            'telefone' => 'numeric|between:10,11',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assinatura.index')->with([
            'assinaturas' => Assinatura::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assinatura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telefone = ((object) $request->all())->telefone;
        $telefone = preg_replace('/[^0-9]/', '', $telefone);
        $request->replace(array('telefone' => $telefone));
        $validator = Validator::make($request->all(), self::validaAssinaturaRegras());
        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $assinatura = new Assinatura();
        $assinatura->fill($request->all());
        if($assinatura->save()) return redirect(route('assinatura.show', $assinatura->id));

        abort(500);
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assinatura = Assinatura::find($id);
        if(!$assinatura->exists) abort(404);
        return view('assinatura.show')->with([
            'assinatura' => $assinatura,
        ]);
    }

    /**
     * por enquanto não vamos precisar disso
     */
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
