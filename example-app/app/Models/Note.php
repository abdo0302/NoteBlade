<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'contenu','priority','date','user_id','category_id'];
    public function categories(): HasMany
    {
        
        return $this->hasMany(Categorie::class);
    }
}
