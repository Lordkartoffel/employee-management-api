<?php

namespace App\Http\Controllers;

use Exception;
use League\Csv\Reader;
use App\Models\Employee;
use League\Csv\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function importCSV(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $path = $request->file('file')->store('temp');
        $file = Storage::path($path);

        $header = null;
        $data = [];
        if (($handle = fopen($file, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        foreach ($data as $employeeData) {
            Employee::create([
                'name' => $employeeData['name'],
                'user_prefix' => $employeeData['user_prefix'],
                'first_name' => $employeeData['first_name'],
                'middle_inital' => $employeeData['middle_inital'],
                'last_name' => $employeeData['last_name'],
                'gender' => $employeeData['gender'],
                'email' => $employeeData['email'],
                'date_of_birth' => $employeeData['date_of_birth'],
                'time_of_birth' => $employeeData['time_of_birth'],
                'age_in_years' => $employeeData['age_in_years'],
                'date_of_joining' => $employeeData['date_of_joining'],
                'age_in_company_years' => $employeeData['age_in_company_years'],
                'phone_no' => $employeeData['phone_no'],
                'place_name' => $employeeData['place_name'],
                'county' => $employeeData['county'],
                'city' => $employeeData['city'],
                'zip' => $employeeData['zip'],
                'region' => $employeeData['region'],
            ]);
        }

        Storage::delete($path);

        return response()->json(['message' => 'Employees imported successfully'], 200);
    }


    //select all Employee
    public function getAllEmployee()
    {
        return response()->json(Employee::all()->toJson());
    }

    //get single Employee
    public function getSingleEmployee(int $id)
    {
        return response()->json(Employee::getSingleEmployeeRecords($id));
    }


    //deletes a single Employee
    public function deleteSingleEmployee(int $id)
    {
        return Employee::deleteEmployee($id);
    }
}

