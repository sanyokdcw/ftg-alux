<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestOrder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'telephone', 'mail', 'city', 'branch', 'department', 'payment', 'comment', 'sum', 'status'];
}
