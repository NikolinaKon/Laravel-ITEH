<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'event_type',
        'place',
        'date',
        'photographer_id',
        'user_id'
    ];

    public $timestamps = false;

    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
