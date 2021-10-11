<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    use Translatable;
    protected $translatable = ['text'];

}
