<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CSVController extends Controller
{
    public function generateCSV(Request $request)
    {
        $data = $request->input('data'); // Assume `data` is an array of arrays.
        
        // Create the response
        $response = new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');
            
            // Add headers (optional)
            fputcsv($handle, ['Column 1', 'Column 2', 'Column 3']);

            // Add rows
            foreach ($data as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="user_data.csv"');

        return $response;
    }
}
