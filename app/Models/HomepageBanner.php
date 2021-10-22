<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageBanner extends Model
{
    use HasFactory;
    protected $table = 'homepage_banner';
    protected $fillable = ['image', 'mobile'];
}
