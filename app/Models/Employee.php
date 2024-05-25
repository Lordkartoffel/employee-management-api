<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'age'
    ];


    public static function getAllEmployeeRecords()
    {
        return self::all()->OrderBy('id', 'DESC')->get();
    }

    public static function getSingleEmployeeRecords()
    {
        return self::all()->OrderBy('id', 'DESC')->get();
    }

    public static function deleteEmployee()
    {
        return self::all()->OrderBy('id', 'DESC')->get();
    }
}
