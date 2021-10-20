<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        $path = storage_path() . "cartass.json";
        $json = json_decode(file_get_contents($path), true);
        info($json);
        //$random = sprintf('%06X', mt_rand(0, 0xFFFFFF));
        // $request->validate([
        //     'nickname' => 'required',
        //     'password' => 'required',
        //     'device_name' => 'required',
        // ]);
        // $codigo = sprintf('%06X', mt_rand(0, 0xFFFFFF));
        // $partida = Partida::where('id', $codigo)->first();
        // if (!$partida) {

        //     $partida = Partida::create(
        //         [
        //             "id" => $codigo,
        //             "fecha_inicio" => now(),
        //             "programador_carta_id" => "",
        //             "modulo_carta_id" => "",
        //             "error_carta_id" => "",
        //         ]
        //     );
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function show(Partida $partida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partida $partida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partida $partida)
    {
        //
    }
}
