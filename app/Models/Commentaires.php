<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Commentaires extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['description'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function replies(){
        return $this->hasMany(Commentaires::class);
    }

    public function parent(){
        return $this->belongsTo(Commentaires::class);
    }
}
