<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class Controller_Campaign extends Controller
{
    public function store(Request $request)
    {
        $campaign = Campaign::create($request->all());

        $campaign->account()->create([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
        ]);

        $campaign->categories()->attach($request->categories);
        
        
        return response()->json(['message' => 'Campaign created successfully', 'campaign' => $campaign], 201);
    }
}
