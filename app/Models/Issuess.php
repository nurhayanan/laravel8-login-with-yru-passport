<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuess extends Model
{
    use HasFactory;
    protected $fillable = [
        'strategic_id', 'issuess_name',
    ];
}
