<?php

namespace App\Http\Controllers;

use App\Baby;
use Illuminate\Http\Request;

class BabiesController extends Controller
{
    // To make auth necessary for everything with babies
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babies = auth()->user()->babies;

        return view('babies.index', compact('babies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('babies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $this->validateBaby();

        // Readjust the date - We might have to change this.
        $date = date_create($validated['birthday']);
        $validated['birthday'] = $date;

        // Setting the user id
        $validated['user_id'] = auth()->id();

        $baby = Baby::create($validated);

        return redirect('/babies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Baby  $Baby
     * @return \Illuminate\Http\Response
     */
    public function show(Baby $baby)
    {
        // Check to see if the user is the parent of the baby
        $this->authorize('view', $baby);

        return view('babies.show', compact('baby'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Baby  $Baby
     * @return \Illuminate\Http\Response
     */
    public function edit(Baby $baby)
    {
        // Check to see if the user is the parent of the baby
        $this->authorize('view', $baby);

        return view('babies.edit', compact('baby'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Baby  $Baby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baby $baby)
    {
        // Check to see if the user is the parent of the baby
        $this->authorize('update', $baby);

        $baby->update($this->validateBaby());

        return redirect('/babies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Baby  $Baby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baby $baby)
    {
        // Check to see if the user is the parent of the baby
        $this->authorize('delete', $baby);

        $baby->delete();
        return redirect('/babies');
    }

    /**
     * Validate the form submission for creating babies
     * 
     * 
     */
    protected function validateBaby() {
        return request()->validate([
            'name' => ['required', 'min:1'],
            'birthday' => ['required'],
            'gender' => ['required']
        ]);
    }
}
