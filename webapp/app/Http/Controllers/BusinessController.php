<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    const DAYS = ['7_days', '14_days', '30_days', '60_days', '90_days'];

    // Not used
    public function index()
    {
        return view('business.index', [
            'businesses' => Business::paginate(15),
        ]);
    }

    public function show($id)
    {
        $business = Business::with(['nearbyBusinesses' => function($query) {
            $query->take(4);
        }])->find($id);
        $business_data = collect($business)->only([
            'name',
            'city',
            'state'
        ])->toArray();
        $business_data['loc'] = [
            'lat' => $business->latitude,
            'lng' => $business->longitude,
        ];
        $map_data = [];
        $chart_data = [];

        foreach ($business->nearbyBusinesses->mergeRecursive([$business]) as $nearby_business)
        {
            $chart_record = [
                'name' => $nearby_business->name,
                'data' => [],
            ];

            foreach (self::DAYS as $day)
            {
                $count = 0;
                $checkin = $nearby_business->checkins->where('count_type', $day)->first();
                if($checkin)
                    $count = $checkin->count;
                $chart_record['data'][] = $count;
            }
            $chart_data[] = $chart_record;

            if($nearby_business->id === $business->id)
                continue;

            $map_data[] = [
                'id' => $nearby_business->id,
                'name' => $nearby_business->name,
                'loc' => [
                    'lat' => $nearby_business->latitude,
                    'lng' => $nearby_business->longitude,
                ],
            ];
        }

        return view('business.show', compact([
            'business_data',
            'map_data',
            'chart_data',
        ]));
    }
}
