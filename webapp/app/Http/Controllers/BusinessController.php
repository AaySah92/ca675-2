<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    // Not used
    public function index()
    {
        return view('index', [
            'businesses' => Business::paginate(15),
        ]);
    }

    public function show($id)
    {

    }
}
