<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaign.create');
    }

    public function store(Request $request)
    {
        Campaign::create($request->all());

        return redirect('/campaign')
            ->with('success', 'Campaign berhasil ditambahkan');
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);

        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        $campaign->update($request->all());

        return redirect('/campaign')
            ->with('success', 'Campaign berhasil diupdate');
    }

    public function destroy($id)
    {
        Campaign::destroy($id);

        return redirect('/campaign')
            ->with('success', 'Campaign berhasil dihapus');
    }
}