<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use Translatable;
    
    protected $translatable = ['title', 'description', 'deadline', 'object_name', 'task', 'solution', 'result'];
    protected $casts = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];
}
