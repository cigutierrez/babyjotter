<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicationRequest;
use App\Medications;
use App\Baby;
use Illuminate\Http\Request;

class MedicationsController extends Controller
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
    public function index($baby_id)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

         // Get all of the naps
         $medications = $baby->medications;

        return view('medications.index', compact('medications', 'baby_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($baby_id)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // Return the create nap page.
        return view('medications.create', ['id' => $baby_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicationRequest $request, $baby_id)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        $validated = $request->validated();

        // Check to see if the optional fields were included aka not null
        if ($validated['how_often'] == null) 
        {
            $validated['how_often'] = 0;
        }
        if ($validated['times_per_day'] == null) 
        {
            $validated['times_per_day'] = 0;
        }
        if ($validated['amount'] == null)
        {
            $validated['amount'] = 0;
        }
        if (array_key_exists('measurement', $validated) == false || $validated['measurement'] == null)
        {
            $validated['measurement'] = 0;
        }
        if ($validated['notes'] == null)
        {
            $validated['notes'] = "";
        }

        // Need to add the baby_id onto validated
        $validated['baby_id'] = $baby_id;

        $med = Medications::create($validated);

        return $med;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function show($baby_id, Medications $medications)
    {
        //
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function edit($baby_id, Medications $medications)
    {
        //
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function update(MedicationRequest $request, $baby_id, Medications $medications)
    {
        //
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function destroy($baby_id, Medications $medications)
    {
        //
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);
    }

    // Protected functions
    // This is our custom policy basically. It ensures that no parent can see a baby that is not theirs.
    protected function findBaby($id)
    {
        // Search for the baby
        $baby = Baby::find($id);

        $this->authorize('view', $baby);
        return $baby;
    }
}
