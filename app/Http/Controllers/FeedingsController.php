<?php

namespace App\Http\Controllers;

use App\Baby;
use App\Feedings;
use App\Http\Requests\FeedingRequest;
use Illuminate\Http\Request;

class FeedingsController extends Controller
{
    // To make auth necessary for everything with feedings
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $baby = $this->findBaby($id);
        
        // Get all of the feedings
        $feedings = $baby->feedings;
        // return $feedings;

        return view('feedings.index', compact(['feedings', 'id']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('feedings.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedingRequest $request)
    {
        //
        $validated = $request->validated();
        // Setting the user id
        $validated['baby_id'] = $request->babyId; 

        // Check to see if things exist
        // If this is a formula, then breast should not be filled out
        if (array_key_exists('breast', $validated) == false)
        {
            $validated['breast'] = 0;
        }
        // If this is a breast feeding
        if (array_key_exists('amount', $validated) == false)
        {
            $validated['amount'] = 0;
            $validated['measurement'] = 0;
        }

        $feeding = Feedings::create($validated);
        return redirect('/babies/'.$request->babyId.'/feedings');
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

    // Protected functions
    protected function findBaby($id)
    {
        // Search for the baby
        $baby = Baby::find($id);

        $this->authorize('view', $baby);
        return $baby;
    }
}
