<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Position extends Model
{
    use HasFactory;
    use Translatable;
    
    protected $translatable = ['name'];

    public function employees(){
        return $this->HasMany(Employee::class);
    }
}
