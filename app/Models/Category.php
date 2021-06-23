<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    public function subcategories(){
        return $this->HasMany(Subcategory::class);
    }
    use Translatable;
    
    protected $translatable = ['name'];
}
