<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $fillable = ['id_table', 'id_user', 'is_confirmed'];
    protected $hidden = ['created_at', 'updated_at'];
}
