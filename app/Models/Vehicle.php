<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model_name',
        'description',
        'color',
        'price',
        'manufacturer_id',
        'type_id'
    ];


    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }



}
