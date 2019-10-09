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
        // Verify the user is the parent of the baby.
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
        // return $validated;
        // Setting the user id
        $validated['baby_id'] = $request->babyId; 

        // Check to see if things exist
        // If this is a formula, then breast should not be filled out
        if (array_key_exists('breast', $validated) == false)
        {
            $validated['breast'] = 0;
        }
        // If this is a breast feeding
        if (array_key_exists('amount', $validated) == false || $validated['amount'] == null)
        {
            $validated['amount'] = 0;
            $validated['measurement'] = 0;
        }
        // If there is no length
        if (array_key_exists('length', $validated) == false || $validated['length'] == null)
        {
            $validated['length'] = "00:00:00";
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
    public function show(Request $request, $baby_id, Feedings $feeding)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        return view('feedings.show', compact('feeding'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $baby_id, Feedings $feeding)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);


        // Return a view with the feeding and baby_id
        return view('feedings.edit', ['feeding' => $feeding, 'baby_id' => $baby_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function update(FeedingRequest $request, $baby_id, Feedings $feeding)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        $validated = $request->validated();

        $feeding->update($validated);
        return redirect('/babies/'.$request->babyId.'/feedings');

        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedings  $feedings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $baby_id, Feedings $feeding)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // Delete the feeding
        $feeding->delete();

        // return back to the feedings page
        return redirect("/babies/".$baby_id."/feedings");
    }

    // Protected functions
    // This is our custom policy basically.
    protected function findBaby($id)
    {
        // Search for the baby
        $baby = Baby::find($id);

        $this->authorize('view', $baby);
        return $baby;
    }
}
