<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportEnquiriesController extends Controller
{
    public function export(Request $request): StreamedResponse
    {
        $search = trim($request->query('search', ''));

        $query = DB::table('contacts')
            ->select([
                'id',
                'name',
                'email',
                'subject',
                'message',
                'status',
                'created_at',
            ])
            ->orderByDesc('id');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $filename = 'novatech_enquiries_' . now()->format('Y-m-d_H-i-s') . '.csv';

        return response()->streamDownload(function () use ($query) {
            $output = fopen('php://output', 'w');

            // Excel UTF-8 support
            fwrite($output, "\xEF\xBB\xBF");

            fputcsv($output, [
                'ID',
                'Name',
                'Email',
                'Subject',
                'Message',
                'Status',
                'Date',
            ]);

            $query->chunk(500, function ($enquiries) use ($output) {
                foreach ($enquiries as $enquiry) {
                    fputcsv($output, [
                        $enquiry->id,
                        $enquiry->name,
                        $enquiry->email,
                        $enquiry->subject,
                        $enquiry->message,
                        $enquiry->status,
                        $enquiry->created_at,
                    ]);
                }
            });

            fclose($output);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}