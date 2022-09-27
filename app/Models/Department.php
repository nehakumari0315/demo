<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;
class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department',
        ];

    public function department_list()
    {
        return $this->hasMany(Designation::class, 'department_id', 'id');
    }

}
