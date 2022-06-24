<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_code',
        'department_name',
        'clearance_status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('department_clearance_status');
    }
}
