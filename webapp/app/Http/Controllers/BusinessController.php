<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    const GRAPH_COLUMNS = [
        'name',
        'latitude',
        'longitude',
        'count',
    ];

    // Not used
    public function index()
    {
        return view('business.index', [
            'businesses' => Business::paginate(15),
        ]);
    }

    public function show($id)
    {
        $business = Business::find($id);
        $graph_data = [];

        foreach ($business->nearbyBusinesses->mergeRecursive([$business]) as $nearby_business)
        {
            array_push($graph_data, array_merge(
                collect($nearby_business)->only(self::GRAPH_COLUMNS)->toArray(),
                [
                    'checkins' => collect($nearby_business->checkins)->mapWithKeys(function ($item, $key) {
                        return [$item['count_type'] => $item['count']];
                    })->toArray()
                ]
            ));
        }
        $response = [
            'business' => $business->toArray(),
            'graph_data' => $graph_data,
        ];

        dd($response);

        return view('business.show', $response);
    }
}
