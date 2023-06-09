<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\texture;
use App\Http\Requests\StoretextureRequest;
use App\Http\Requests\UpdatetextureRequest;

class TextureController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretextureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretextureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function show(texture $texture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function edit(texture $texture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetextureRequest  $request
     * @param  \App\Models\texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetextureRequest $request, texture $texture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function destroy(texture $texture)
    {
        //
    }
}