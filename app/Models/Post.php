<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    const BOORADOR =1;
    const PUBLICADO=2;

    //relacion uno a muchos inversa

    public function user(){
       return  $this->BelongsTo(User::class);
    }
    public function category(){
       return $this->BelongsTo(Categories::class);
    }

    //relacion muchos a muchos

    public function tags(){
       return $this->BelongsToMany(Tags::class);
    }

    //Relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Images::class, 'imageable');
    }
}
