<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diagnostico;
use App\Http\Requests\StoreDiagnosticoRequest;
use App\Http\Requests\UpdateDiagnosticoRequest;
use App\Http\Resources\DiagnosticoResource;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('searchId') || request('searchDesc') || request('favoritos') || request('tags')) {

            return DiagnosticoResource::collection(
                Diagnostico::where('valido', true)
                    ->with('descricao', 'tags')
                    ->when(request('searchId'),  function ($q) {
                        $q->where('codigo', 'like', '%' . request('searchId') . '%');
                    })
                    ->when(request('searchDesc'),  function ($p) {
                        $search = str_replace(" ", "%", request('searchDesc'));
                        $p->Where('descricao_longa', 'like', '%' . $search . '%');
                    })
                    ->when(request('favoritos'),  function ($p) {
                        $p->withWhereHas('favoritos');
                    })
                    ->when(request('tags'),  function ($s) {
                        $s->withWhereHas('tags', function ($b) {
                            $b->whereIn('id', [request('tags')]);
                        });
                    })
                    ->get()
            );
        } else {
            return [];
        }
    }


    public function store(StoreDiagnosticoRequest $request)
    {
        //
    }


    public function show(Diagnostico $diagnostico)
    {
        //
    }

    public function update(UpdateDiagnosticoRequest $request, Diagnostico $diagnostico)
    {
        try {
            if ($diagnostico->descricao) {
                if ($request->validated('descricao_personalizada')=="")
                    $diagnostico->descricao()->delete();
                else
                    $diagnostico = $diagnostico->descricao()->update($request->safe()->only(['descricao_personalizada']));
            } else {
                $diagnostico = $diagnostico->descricao()->create($request->safe()->only(['descricao_personalizada']));
            }
            return "sucesso";
        } catch (\Throwable $th) {

            return $th;
        }
    }


    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();

        return new DiagnosticoResource($diagnostico);
    }

    public function toogleFavorito(Diagnostico $diagnostico)
    {
        if ($diagnostico->favoritos->count())
            $diagnostico->favoritos()->delete();
        else
            $diagnostico->favoritos()->create();

        return new DiagnosticoResource($diagnostico);
    }
}
