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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric',
            'collected_donation' => 'required|numeric',
            'deadline' => 'required|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $data['attachment'] = $file->store('campaigns', 'public');
            $data['file_type'] = strtolower($file->getClientOriginalExtension());
        }

        Campaign::create($data);

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

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric',
            'collected_donation' => 'required|numeric',
            'deadline' => 'required|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $data['attachment'] = $file->store('campaigns', 'public');
            $data['file_type'] = strtolower($file->getClientOriginalExtension());
        }

        $campaign->update($data);

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