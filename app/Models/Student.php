<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $table = 'student';

    public $fillable = [
        'fio',
        'group',
        'course'
    ];

    protected $casts = [
        'fio' => 'string',
        'group' => 'string',
        'course' => 'string'
    ];

    public static $rules = [
        'fio' => 'required',
        'group' => 'required',
        'course' => 'required'
    ];

}
