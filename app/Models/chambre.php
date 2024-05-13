<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chambre extends Model
{
    use HasFactory;

    protected $table = 'chambres';

    protected $fillable = [
        'numero',
        'type',
        'systeme',
        'vu',
        'tarif',
        'status',
        'user_id'
    ];
}
