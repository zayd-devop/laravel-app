<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;
    public function Adherent()
{
    return $this->hasOne(Adherent::class);
}
}
