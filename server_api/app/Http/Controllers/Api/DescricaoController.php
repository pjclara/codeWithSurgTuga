<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Descricao;
use App\Http\Requests\StoreDescricaoRequest;
use App\Http\Requests\UpdateDescricaoRequest;

class DescricaoController extends Controller
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
     * @param  \App\Http\Requests\StoreDescricaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDescricaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Descricao  $descricao
     * @return \Illuminate\Http\Response
     */
    public function show(Descricao $descricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDescricaoRequest  $request
     * @param  \App\Models\Descricao  $descricao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDescricaoRequest $request, Descricao $descricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Descricao  $descricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descricao $descricao)
    {
        //
    }
}
