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

    public static function getSingleEmployeeRecords(int $id)
    {
        return self::select('*')->where('id', $id)->get()->toJson();
    }

    public static function deleteEmployee(int $id)
    {
        return self::where('id', $id)->delete();
    }
}
