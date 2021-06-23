<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Translatable;
    
    protected $translatable = ['status'];

    protected $fillable = ['user_id', 'sum', 'status'];

    public function order_products(){
        return $this->HasMany('App\Models\OrderProduct');
    }    
}
