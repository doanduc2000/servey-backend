<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';
    protected $primaryKey = 'id';
    public function question()
    {
        return $this->belongsTo('App\Question', 'id_question', 'id');
    }
}
