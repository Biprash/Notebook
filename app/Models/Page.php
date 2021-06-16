<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected  $fillable = [
        'note_id',
        'title',
    ];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
