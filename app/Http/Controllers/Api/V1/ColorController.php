<?php

namespace App\Http\Controllers\Api\V1;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Resources\Colour as ColourResource;


class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ColourResource(Color::with([])->get());
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

        return new ColourResource($colour);
    }
}
