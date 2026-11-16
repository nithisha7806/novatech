<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminEnquiriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $enquiries = Contact::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest('created_at')
            ->get();

        return view('admin.enquiries', compact('enquiries', 'search'));
    }
}