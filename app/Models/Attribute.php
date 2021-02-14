<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ObjectModel;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable =[
        'attribute_name',
        'employee_name',
        'employee_phone',
        'active',
        'expired_at'
    ];

    protected $dates =['expired_at'];
}