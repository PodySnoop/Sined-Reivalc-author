<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';

    protected $fillable = [
        'chanson_id',
        'auteur',
        'contenu'
    ];

    public function chanson()
    {
        return $this->belongsTo(\App\Models\Chanson::class, 'chanson_id');
    }
}
