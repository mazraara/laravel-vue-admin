<?php

namespace App\Http\Controllers\Api\V1;

use App\Size;
use Illuminate\Http\Request;
use App\Http\Resources\Size as SizeResource;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SizeResource(Color::with([])->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colour = Color::with([])->findOrFail($id);

        return new SizeResource($colour);
    }
}
