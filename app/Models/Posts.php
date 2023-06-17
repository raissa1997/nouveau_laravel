<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Posts extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['description','image',];

    public function commentaires(){
        return $this->hasMany(Commentaires::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
