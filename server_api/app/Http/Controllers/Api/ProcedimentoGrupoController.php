<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProcedimentoGrupo;
use App\Http\Requests\StoreProcedimentoGrupoRequest;
use App\Http\Requests\UpdateProcedimentoGrupoRequest;
use App\Http\Resources\ProcedimentoGrupoResource;

class ProcedimentoGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimentos = ProcedimentoGrupo::all();

        $procedimentos = ProcedimentoGrupo::select('1_digito')->where('1_digito', "0")->distinct()->with('subcategory', function($q){
            $q->distinct()->take(5);
        })->get()->dd();


        return ProcedimentoGrupoResource::collection(ProcedimentoGrupo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProcedimentoGrupoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcedimentoGrupoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcedimentoGrupo  $procedimentoGrupo
     * @return \Illuminate\Http\Response
     */
    public function show(ProcedimentoGrupo $procedimentoGrupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcedimentoGrupoRequest  $request
     * @param  \App\Models\ProcedimentoGrupo  $procedimentoGrupo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcedimentoGrupoRequest $request, ProcedimentoGrupo $procedimentoGrupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcedimentoGrupo  $procedimentoGrupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcedimentoGrupo $procedimentoGrupo)
    {
        //
    }
}
