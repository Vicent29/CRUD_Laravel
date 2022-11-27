<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class User extends Model
{
   use HasFactory;
 
   protected $table = 'users';
   protected $fillable = [
       'is_active',
       'name',
       'passwd',
       'email',
       'type_user'
   ];

   public function tables()
    {
        return $this->morphedByMany(Table::class, 'id_table');
    }
}

