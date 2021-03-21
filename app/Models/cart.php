<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = ['session_id'];

    public function total()
    {
        return $this->PhotoVariations->count();
    }

    public function totalAmount()
    {
        return $this->PhotoVariations->sum('price');
    }



    public function PhotoVariations()
    {
        return $this->belongsToMany(PhotoVariation::class,'cart_photo');

    }
}
