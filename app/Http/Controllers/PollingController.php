<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePollingStationRequest;
use App\Models\Constituency;
use App\Models\PollingStation;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        $pollingStations = PollingStation::with([
            'sectionnames' => function ($s) {
                $s->withCount('members');
            }
        ])->where(function ($q) use ($query) {
            if ($query) {
                $q->where('SNO', 'LIKE', '%' . $query . '%')->orWhere('locality', 'LIKE', '%' . $query . '%')->orWhere(
                    'building_location',
                    'LIKE',
                    '%' . $query . '%'
                );
            }
        })->orderBy('polling_area', 'asc')->paginate(10)->appends(['query' => $query]);

        return view('layouts.PollingStation.pollingStation', compact('pollingStations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollingStationRequest $request)
    {
        $this->authorize('is_admin');

        $data = $request->validated();

        Constituency::query()->findOrFail($data['constituency_id'])->pollingstations()->create($data);

        return redirect()->route('pollingstation.index')->with('success', 'Polling Station Created');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('is_admin');

        $constituencies = Constituency::all();

        return view('layouts.PollingStation.create-polling', compact('constituencies'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $constituency = Constituency::query()
            ->select('id', 'name')
            ->with([
                'pollingstations' => function ($query) {
                    $query
                        ->select(
                            'locality',
                            'building_location',
                            'polling_area',
                            'total_votes',
                            'constituency_id',
                            'id',
                            'SNO'
                        )
                        ->orderBy('SNO', 'asc')
                        ->with([
                            'sectionnames' => function ($query) {
                                $query->select('id', 'polling_station_id', 'name')->withCount('members');
                            }
                        ])
                        ;
                }
            ])->where('id', $id)->first();


        return view('layouts.PollingStation.Constituency_pollingstation', compact('constituency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('is_admin');

        $polling_station = PollingStation::query()->findOrFail($id);

        $constituencies = Constituency::all();

        return view('layouts.PollingStation.edit-polling', compact('polling_station', 'constituencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'SNO' => 'required|numeric',
            'locality' => 'required|string|unique:polling_stations,locality,' . $id,
            'building_location' => 'required|string',
            'polling_area' => 'required|string',
            'total_votes' => 'required|numeric',
            'constituency_id' => 'required|exists:constituencies,id',
        ]);

        // Find the polling station by ID
        $pollingStation = PollingStation::findOrFail($id);

        // Update the polling station with the validated data
        $pollingStation->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('pollingstation.index')->with('success', 'Polling Station updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('is_admin');

        $pollingstation = PollingStation::findOrfail($id);

        $pollingstation->delete();

        return redirect()->back()->with('success', 'Polling Station Deleted');
    }

    public function fetchSections($id)
    {
        $pollingstations = PollingStation::where('constituency_id', $id)->get();

        if ($pollingstations->isEmpty()) {
            return response()->json(['error' => 'Sections not found for the specified polling station.'], 404);
        }

        return response()->json($pollingstations);
    }
}
