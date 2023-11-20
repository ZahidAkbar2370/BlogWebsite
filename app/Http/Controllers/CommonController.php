<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Response;


class CommonController extends Controller

{
    public function exportData(Request $request)
    {
        // Retrieve data from the database using the model
        $data = Blog::all();

        // Create a CSV string
        $csv = $this->arrayToCsv($data->toArray());

        // Set the headers for the response
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="blog.csv"',
        );

        // Return the CSV as a downloadable file
        return Response::make($csv, 200, $headers);
    }

    private function arrayToCsv(array $array)
    {
        $output = fopen('php://memory', 'w');

        // Write the CSV headers
        fputcsv($output, array_keys($array[0]));

        // Write the data rows
        foreach ($array as $row) {
            fputcsv($output, $row);
        }

        // Move back to the beginning of the stream
        fseek($output, 0);

        // Get the contents of the "file"
        $csv = stream_get_contents($output);

        // Close the "file"
        fclose($output);

        return $csv;
    }
}


