<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offers extends Model
{
    use HasFactory;
    public $table="offers";
    protected $fillable = [
        // Other fields here
        'Status',
    ];
    protected $primaryKey = 'Offer_ID';
    public $timestamps = false; 
}

