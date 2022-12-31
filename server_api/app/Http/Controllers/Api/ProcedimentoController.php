<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Procedimento;
use App\Http\Requests\StoreProcedimentoRequest;
use App\Http\Requests\UpdateProcedimentoRequest;
use App\Http\Resources\ProcedimentoResource;

class ProcedimentoController extends Controller
{

    public function index()
    {

        if (request('searchId') || request('searchDesc') || request('favoritos') || request('tags')) {

            return ProcedimentoResource::collection(
                Procedimento::where('valido', true)
                    ->with('descricao')
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


    public function store(StoreProcedimentoRequest $request)
    {
        //
    }


    public function show(Procedimento $procedimento)
    {
        //
    }


    public function update(UpdateProcedimentoRequest $request, Procedimento $procedimento)
    {
        try {
            if ($procedimento->descricao) {
                if ($request->validated('descricao_personalizada') == "")
                    $procedimento->descricao()->delete();
                else
                    $procedimento = $procedimento->descricao()->update($request->safe()->only(['descricao_personalizada']));
            } else {
                $procedimento = $procedimento->descricao()->create($request->safe()->only(['descricao_personalizada']));
            }
            return "successo";
        } catch (\Throwable $th) {

            return $th;
        }
    }


    public function destroy(Procedimento $procedimento)
    {
    }

    public function toogleFavorito(Procedimento $procedimento)
    {
        if ($procedimento->favoritos->count())
            $procedimento->favoritos()->delete();
        else
            $procedimento->favoritos()->create();

        return new ProcedimentoResource($procedimento);
    }
}
