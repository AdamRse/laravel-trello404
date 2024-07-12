<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'backround', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);//Relation many to one
    }

    public function lists()
    {
        return $this->hasMany(Lists::class);//Relation One to many
    }
}
