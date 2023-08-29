<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CsvController extends Controller
{
    public function download(Request $request)
    {
        $data = $request->data;

        $filename = 'cep.csv';

        $tempFile = tempnam(sys_get_temp_dir(), 'csv');

        $file = fopen($tempFile, 'w');

        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        $response = new Response(file_get_contents($tempFile));
        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        unlink($tempFile);

        return $response;
    }
}
