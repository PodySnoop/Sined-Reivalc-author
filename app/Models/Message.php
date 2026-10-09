<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sujet',
        'contenu',
        'envoye_par',
        'vu',
        'traite',
        'supprime',
        'reponse',
        'chanson_id',
    ];

    public function chanson()
    {
        return $this->belongsTo(Chanson::class);
    }
}
