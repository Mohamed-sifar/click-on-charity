<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Log; // Import the Log facade

class HelpRequestController extends Controller
{
    public function index(): Response
    {
        $requests = HelpRequest::all();
        return Inertia::render('Admin/NeedHelpCURD', [
            'requests' => $requests,
        ]);
    }

    public function store(Request $request): Response
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nic' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'help_type' => 'required|string|in:financial_aid,medical_assistance,food,shelter,education',
            'description' => 'required|string',
            'urgency' => 'required|string|in:immediate,week,month',
            'supporting_documents' => 'nullable|array|max:5',
            'supporting_documents.*' => 'file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $existingRequest = HelpRequest::where('email', $data['email'])
            ->orWhere('nic', $data['nic'])
            ->first();

        if ($existingRequest) {
            return Inertia::render('Website/NeedHelp', [
                'errors' => ['email' => 'The email or NIC is already used for a help request.'],
                'form' => $data
            ]);
        }

        $data['status'] = 'not_verified';

        if ($request->hasFile('supporting_documents')) {
            $data['supporting_documents'] = array_map(function ($file) {
                return Storage::disk('public')->putFile('supporting_documents', $file);
            }, $request->file('supporting_documents'));
        }

        HelpRequest::create($data);

        return Inertia::render('Website/NeedHelp', [
            'success' => 'Help request submitted successfully!',
            'form' => $data
        ]);
    }

    public function show($id): Response
    {
        $request = HelpRequest::findOrFail($id);
        return Inertia::render('Admin/NeedHelpCURD', [
            'request' => $request
        ]);
    }

    public function update(Request $request, $id)
    {
        $helpRequest = HelpRequest::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nic' => 'required|string|max:20',
            'help_type' => 'required|string',
            'description' => 'required|string',
            'urgency' => 'required|string',
            'status' => 'required|string|max:50',

        ]);

        // Handle new document uploads

        $helpRequest->update($validated);

        return redirect()->route('needhelp-curd.index')->with('success', 'Request updated successfully.');
    }
    

   

}
