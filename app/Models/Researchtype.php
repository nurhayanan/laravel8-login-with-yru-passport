<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researchtype extends Model
{
    use HasFactory;
    protected $fillable = [
        'research_type',
    ];
}
