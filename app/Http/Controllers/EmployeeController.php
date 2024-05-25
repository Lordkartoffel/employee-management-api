<?php

namespace App\Http\Controllers;

use Exception;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function importCSV(Request $request)
    {
        if ($request->header('Content-Type') !== 'text/csv') {
            return response()->json(['error' => 'Content-Type must be text/csv'], 400);
        }

        try {

            $csvData = $request->getContent();
            $csv = Reader::createFromString($csvData);
            $csv->setHeaderOffset(0);


            $records = (new Statement())->process($csv);


            $data = iterator_to_array($records, true);

            return response()->json(['message' => 'File successfully processed', 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
