<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsFilter extends Model
{
    protected $table = 'allactivenewswithrating';
    use HasFactory;
}
