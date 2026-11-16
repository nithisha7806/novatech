<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Validation\Rule;

class EnquiryStatusController extends Controller
{
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in(['New', 'In Progress', 'Completed']),
            ],
        ]);

        $enquiry = Contact::findOrFail($id);

        $enquiry->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Enquiry status updated successfully!');
    }
}