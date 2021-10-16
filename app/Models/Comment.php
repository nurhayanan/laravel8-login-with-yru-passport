<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'cread',
        'comment',
        'project_id',
    ];
    protected $guarded = [];
    protected $table = 'comments';
}
