<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';
    protected $fillable = [
        'name',
        'capacity',
        'type',
        'id_thematic'
    ];

    public function thematic()
    {
        return $this->belongsTo(Thematic::class);
    }
    public function users()
	{
        return $this->morphedByMany(User::class, 'id_user');
	}
}
