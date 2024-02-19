<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'title',
        'phone',
        'lead_source',
        'last_name',
        'company',
        'email',
        'lead_status',
        'street',
        'state',
        'country',
        'city',
        'zip_code',
        'description',
    ];
}
