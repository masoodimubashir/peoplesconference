<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\PollingStation;
use App\Models\SectionName;
use Illuminate\Http\Request;

class SectionNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $pollingstations = PollingStation::whereHas('sectionnames', function ($sectionNamesQuery) use ($query) {
                $sectionNamesQuery->where('name', 'LIKE', '%' . $query . '%');
            })
                ->with('sectionnames')
                ->orderBy('id')
                ->paginate(10)
                ->appends(['query' => $query]);
        } else {
            $pollingstations = PollingStation::with('sectionnames')
                ->orderBy('id')
                ->paginate(10);
        }

        return view('layouts.Section.section', compact('pollingstations'));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('is_admin');

        $constituencies = Constituency::all();

        return view('layouts.Section.create_section', compact('constituencies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->authorize('is_admin');

        $data = $request->validate(['name' => 'required|string', 'polling_station_id' => 'required|exists:polling_stations,id'

        ]);

        PollingStation::query()->findOrFail($data['polling_station_id'])->sectionnames()->create($data);

        return redirect()->back()->with('success', 'Section Created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pollingStations = PollingStation::where('constituency_id', $id)->get();

        return route('section.create', 'pollingStations');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('is_admin');

        $section = SectionName::findOrFail($id);

        $constituencies = Constituency::all();

        return view('layouts.Section.edit-section', compact('section', 'constituencies'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->authorize('is_admin');

        $validatedData = $request->validate(['name' => 'required|string']);

        $section = SectionName::findOrFail($id);

        $section->update($validatedData);

        return redirect()->route('section.index')->with('success', 'Section Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('is_admin');

        SectionName::findOrFail($id)->delete();

        return redirect()->back()->with('error', 'Section Deleted');

    }
}
