<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEnquiries = Contact::count();

        $recentEnquiries = Contact::latest('created_at')
            ->take(5)
            ->get();

        // Enquiry status counts
        $newEnquiries = Contact::where('status', 'New')->count();

        $inProgressEnquiries = Contact::where('status', 'In Progress')->count();

        $completedEnquiries = Contact::where('status', 'Completed')->count();

        return view('admin.dashboard', compact(
            'totalEnquiries',
            'recentEnquiries',
            'newEnquiries',
            'inProgressEnquiries',
            'completedEnquiries'
        ));
    }
}