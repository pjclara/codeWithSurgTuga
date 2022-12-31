<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favotito;
use App\Http\Requests\StoreFavotitoRequest;
use App\Http\Requests\UpdateFavotitoRequest;

class FavoritoController extends Controller
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
     * @param  \App\Http\Requests\StoreFavotitoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavotitoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favotito  $favotito
     * @return \Illuminate\Http\Response
     */
    public function show(Favotito $favotito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavotitoRequest  $request
     * @param  \App\Models\Favotito  $favotito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavotitoRequest $request, Favotito $favotito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favotito  $favotito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favotito $favotito)
    {
        //
    }
}
