<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\District;
use Illuminate\Http\Request;

class ConstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $districts = District::select('name', 'id')->with(['constituencies' => function ($q) {
            $q->withCount('pollingStations');
        }])->orderBy('name')->get();
        

        // $districts = District::select('name', 'id')->with('constituencies')->withCount('pollingStations')->orderBy('name')->get();
        
        // dd($districts);


        return view('layouts.Constituency.constitution', compact('districts'));


    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        $this->authorize('is_admin');

        $districts = District::all();

        if (!$districts) {

            return response()->back()->with('error', 'No District Awailable!. Please Insert Your District First');

        }

        return view('layouts.Constituency.create-constuency', compact('districts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->authorize('is_admin');

        $data = $request->validate([
            'name' => 'required|string|unique:constituencies,name',
            'type' => ['required', 'in:A,P'],
            'district_id' => 'required|exists:districts,id',
        ]);

        $district = District::findOrFail($data['district_id']);

        $district->constituencies()->create($data);

        return redirect()->route('constituency.index')->with('success', 'Constituency Created');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $this->authorize('is_admin');

        $constituency = Constituency::query()->findOrFail($id);

        $districts = District::query()->select('name', 'id')->orderBy('Name', 'ASC')->get();

        return view('layouts.Constituency.edit-constituency', compact('districts', 'constituency'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->authorize('is_admin');

        $data = $request->validate([
            'name' => 'required|string|unique:constituencies,name,' . $id,
            'type' => ['required', 'in:A,P'],
            'district_id' => 'required|exists:districts,id',
        ]);

        $constituency = Constituency::findOrFail($id);

        $constituency->update($data);

        return redirect()->route('constituency.index')->with('success', 'Constituency Updated');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

        $this->authorize('is_admin');

        $constituency = Constituency::query()->findOrFail($id);

        $constituency->delete();

        return redirect()->back()->with('success', 'Constituency Deleted');

    }
}
