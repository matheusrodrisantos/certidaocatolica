<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoreParoquiaRequest;
use App\Http\Requests\UpdateParoquiaRequest;
use App\Models\Paroquia;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParoquiaResource;
use App\Traits\HttpResponses;

class ParoquiaController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response(
            'List all paroquias',
            200, 
            new ParoquiaResource(Paroquia::all())
        );
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
    public function store(StoreParoquiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Paroquia $paroquia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paroquia $paroquia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParoquiaRequest $request, Paroquia $paroquia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paroquia $paroquia)
    {
        //
    }
}
