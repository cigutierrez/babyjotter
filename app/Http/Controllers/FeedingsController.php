<?php

namespace App\Http\Controllers;

use App\Baby;
use App\Feedings;
use Illuminate\Http\Request;

class FeedingsController extends Controller
{
    // To make auth necessary for everything with feedings
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $baby = Baby::find($request->id);
        $feedings = $baby->feedings();
        // Show all the feedings
        return view('feedings.show', compact('feedings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd("Hello World");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Babies $baby, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function show(Feedings $feedings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedings $feedings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedings $feedings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedings $feedings)
    {
        //
    }
}
