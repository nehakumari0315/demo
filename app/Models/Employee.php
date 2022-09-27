<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable =[
        'image',
        'name',
        'father',
        'dob',
        'gender',
        'phone',
        'local_address',
        'permanent_address',
        'email',
        'password',
        'employee_id',
        'department',
        'designation',
        'date',
        'salary',
        'account',
        'bank',
        'ifcscode',
        'pan_code',
        'branch',
        'resume',
        'offer_letter',
        'joining_letter',
        'agreement_letter',

    ];
}
