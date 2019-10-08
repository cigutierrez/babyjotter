<?php

namespace App\Http\Controllers;

use App\Diapers;
use App\Baby;
use Illuminate\Http\Request;

class DiapersController extends Controller
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

        // Get all of the diapers
        $diapers = $baby->diapers;

        return view('diapers.index', compact('diapers', 'baby_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($baby_id, Request $request)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // Return the create diapers page.
        return view('diapers.create', ['id' => $baby_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $baby_id)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // First we validate the request
        $validated = $this->validateDiaper();

        // Check to see if notes is null, and if so, just fill it with a 0.
        // If this is a formula, then breast should not be filled out
        if (array_key_exists('notes', $validated) == false)
        {
            $validated['notes'] = "";
        }

        // Save the baby_id
        $validated['baby_id'] = $baby_id;

        // Create a new diaper
        $diaper = Diapers::create($validated);

        return redirect('/babies/'.$baby_id.'/diapers');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diapers  $diapers
     * @return \Illuminate\Http\Response
     */
    // We do not need this route at all because we show all of the information in the index. Redirect to the index
    public function show($baby_id, Diapers $diapers)
    {
        return redirect('/babies/'.$baby_id.'/diapers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diapers  $diapers
     * @return \Illuminate\Http\Response
     */
    public function edit($baby_id, Diapers $diaper)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        return view('diapers.edit', compact('diaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diapers  $diapers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $baby_id, Diapers $diaper)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // Validate the request
        $validated = $this->validateDiaper();

        // Update the diaper
        $diaper->update($validated);

        return redirect('/babies/'.$baby_id.'/diapers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diapers  $diapers
     * @return \Illuminate\Http\Response
     */
    public function destroy($baby_id, Diapers $diaper)
    {
        // Verify that the user is the parent of the baby
        $baby = $this->findBaby($baby_id);

        // Delete the diaper
        $diaper->delete();

        return redirect('/babies/'.$baby_id.'/diapers');
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

    // What we are using to validate the diaper
    protected function validateDiaper() {
        return request()->validate([
            'type' => ['required'],
            // We have notes empty to ensure that is is included with $validated.
            'notes' => []
        ]);
    }
}
