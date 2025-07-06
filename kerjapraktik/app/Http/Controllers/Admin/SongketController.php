<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Songket\StoreSongketRequest;
use App\Http\Requests\Songket\UpdateSongketRequest;
use App\Models\Songket;
use Illuminate\Http\Request;

class SongketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Songket $songket)
    {
        //
    }

/**
     * Show the form for editing the specified resource.
     */
    public function edit(Songket $songket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSongketRequest $request, Songket $songket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Songket $songket)
    {
        //
    }
}