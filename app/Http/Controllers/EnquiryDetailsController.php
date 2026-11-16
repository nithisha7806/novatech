<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EnquiryDetailsController extends Controller
{
    public function show($id)
    {
        $enquiry = DB::table('contacts')->where('id', $id)->first();

        if (!$enquiry) {
            abort(404, 'Enquiry not found.');
        }

        return view('admin.enquiry-details', compact('enquiry'));
    }
}