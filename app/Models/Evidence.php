<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    public $fillable = [
        'directory_id',
        'user_id',
        'folder_name',
        'evidence_id'
    ];
}
