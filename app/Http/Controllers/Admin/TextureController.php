<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Texture;
use App\Http\Requests\StoreTextureRequest;
use App\Http\Requests\UpdateTextureRequest;

class TextureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTextureRequest  $request
     *
     */
    public function store(StoreTextureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\texture  $texture
     *
     */
    public function show(Texture $texture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\texture  $texture
     *
     */
    public function edit(Texture $texture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTextureRequest  $request
     * @param  \App\Models\Texture  $texture
     *
     */
    public function update(UpdateTextureRequest $request, Texture $texture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Texture  $texture
     *
     */
    public function destroy(Texture $texture)
    {
        //
    }
}