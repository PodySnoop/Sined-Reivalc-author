<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    protected $table = 'chansons';

    protected $fillable = [
        'titre',
        'image',
        'sujet',
        'paroles',
        'audio',
        'telechargement',
        'genre'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'chanson_id');
    }
}
