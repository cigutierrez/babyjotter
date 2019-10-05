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

        $validated = $this->fillEmptyFields($validated);

        // Need to add the baby_id onto validated
        $validated['baby_id'] = $baby_id;

        $med = Medications::create($validated);

        return redirect('/babies/'.$baby_id.'/medications/');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    // We do not need this route at all because we show all of the information in the index. Redirect to the index
    public function show($baby_id, Medications $medications)
    {
        //
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        return redirect('/babies/'.$baby_id.'/medications');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function edit($baby_id, Medications $medication)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        return view('medications.edit', compact('medication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function update(MedicationRequest $request, $baby_id, Medications $medication)
    {
        //
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        $validated = $request->validated();

        // Fill the empty fields with 0's
        $validated = $this->fillEmptyFields($validated);

        // Update the medication
        $medication->update($validated);

        return redirect('/babies/'.$baby_id.'/medications');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medications  $medications
     * @return \Illuminate\Http\Response
     */
    public function destroy($baby_id, Medications $medication)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // Delete the medication
        $medication->delete();

        return redirect('/babies/'.$baby_id.'/medications');
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

    protected function fillEmptyFields($data)
    {
        if ($data['notes'] == null)
        {
            $data['notes'] = "";
        }

        return $data;
    }
}
