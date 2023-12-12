<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'content',
        'image',
    ];

    
        //On crée une fonction user qui définit qu'un post a un seul utilisateur et que celui-ci appartient à la classe user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
