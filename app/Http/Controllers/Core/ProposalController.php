<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use App\Http\Requests\ProposalRequest;
use App\Models\Core\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::with('mahasiswa', 'dosen')->get();

        return view('proposals.view', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = User::all();
        return view('proposals.create', compact('mahasiswas', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProposalRequest $request)
    {
        $filename = 'proposal_' . uniqid() . '.' . $request->file('file_proposal')->getClientOriginalExtension();
        $filePath = $request->file('file_proposal')->storeAs('file_proposal', $filename, 'public');
    
        $validatedData = $request->validated();
        $validatedData['file_proposal'] = $filePath;
    
        $proposal = Proposal::create($validatedData);
        $proposal->mahasiswa()->attach($request->mahasiswa_ids);
        $proposal->dosen()->attach($request->dosen_ids);
    
        return redirect()->route('prop.index')->with('success', 'Proposal created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        $proposal->load('mahasiswa', 'dosen');
        return view('proposals.detail', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposal $proposal)
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = User::all();
        return view('proposals.edit', compact('proposal', 'mahasiswas', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProposalRequest $request, Proposal $proposal)
    {
        $data = $request->validated();
    
        if ($request->hasFile('file_proposal')) {
            if ($proposal->file_proposal && Storage::disk('public')->exists($proposal->file_proposal)) {
                Storage::disk('public')->delete($proposal->file_proposal);
            }
    
            $filename = 'proposal_' . time() . '_' . uniqid() . '.' . $request->file('file_proposal')->getClientOriginalExtension();
            $data['file_proposal'] = $request->file('file_proposal')->storeAs('proposals', $filename, 'public');
        }
    
        $proposal->update($data);
    
        return redirect()->route('prop.index')->with('success', 'Proposal updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->mahasiswa()->detach();
        $proposal->dosen()->detach();
        $proposal->delete();

        if ($proposal) {
            return redirect()->route('prop.index')->with('success', 'Proposal Telah Dihapus');
        } else {
            return redirect()->route('prop.index')->with('failed', 'Proposal Gagal Dihapus');
        }
    }
}
