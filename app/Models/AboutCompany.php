<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
    use HasFactory;
    use Translatable;
    
    protected $translatable = ['col1', 'col2', 'col3', 'col4', 'col5', 'col6', 'col1_2', 'col1_3', 'col1_4', 'col2_2', 'col2_4', 'col3_2', 'col3_3', 'col3_4', 'col4_2', 'col5_2', 'col6_2', 'col2_3'];
}
