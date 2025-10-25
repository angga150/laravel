<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::with('user')->get();
        return view('complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('complaints.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_complain' => 'required|unique:complaints',
            'origins' => 'required',
            'status' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        Complaint::create($request->all());
        return redirect()->route('complaints.index')->with('success', 'Data komplain berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        $users = User::all();
        return view('complaints.edit', compact('complaint', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'code_complain' => 'required',
            'origins' => 'required',
            'status' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        $complaint->update($request->all());
        return redirect()->route('complaints.index')->with('success', 'Data komplain berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Data komplain berhasil dihapus.');
    }
}
