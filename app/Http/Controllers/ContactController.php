<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact_us;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $contactus = Contact_us::all(); // Fetch all records
        return Inertia::render('Admin/ContactusCURD', [
            'contactus' => $contactus
        ]);
    }

    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check for existing requests with the same email
        $existingRequest = Contact_us::where('con_email', $request->input('email'))->first();

        if ($existingRequest) {
            return redirect()->back()
                ->withErrors(['email' => 'The email is already used for a help request.'])
                ->withInput();
        }

        // Store the new contact request
        Contact_us::create([
            'con_name' => $request->input('name'),
            'con_email' => $request->input('email'),
            'con_phone' => $request->input('phone'),
            'con_subject' => $request->input('subject'),
            'con_message' => $request->input('message'),
            'created_at' => now(),
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Contact request submitted successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact_us::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json(['success' => 'Record deleted successfully']);
        } else {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
}
