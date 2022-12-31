<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::withCount('diagnosticos')->where('user_id', 1)->orderBy('nome', 'asc')->get();

        return TagResource::collection($tags);
    }


    public function store(StoreTagRequest $request)
    {
        //
    }


    public function show(Tag $tag)
    {
        //
    }


    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }


    public function destroy(Tag $tag)
    {
        //
    }
}
