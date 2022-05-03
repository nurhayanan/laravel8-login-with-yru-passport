<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'filenames',
        'file_path',
        'status',
    ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }
}
