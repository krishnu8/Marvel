<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="franchise";
    protected $fillable = ['Quantity'];
    protected $primaryKey = 'Product_id';
}
