<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    use Translatable;
    
    protected $translatable = ['name'];
    public function category(){
        return $this->BelongsTo(Category::class);
    }

    public function products(){
        return $this->HasMany(Product::class);
    }
}
