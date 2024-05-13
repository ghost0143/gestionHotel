<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'chambre_id',
        'client_id',
        'user_id',
        'endedDate',
        'startedDate',
        'nombrePersonne',
    ];
}
