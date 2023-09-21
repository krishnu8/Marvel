<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review_rating extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="review_rating";
}
