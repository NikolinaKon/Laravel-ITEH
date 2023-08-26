<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'first_name',
        'last_name',
        'email',
        'price_per_hour',
        'equipment'
    ];
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
