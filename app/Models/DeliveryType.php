<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    use HasFactory;

    public function DeliveryMethods(){
        return $this->HasMany('App\Models\DeliveryMethod');
    }
}
