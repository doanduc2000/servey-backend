<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'id';
    public function exam()
    {
        return $this->belongsTo('App\Exam', 'id_exam', 'id');
    }
    public function answer()
    {
        return $this->hasMany('Models\Answer', 'id', 'id_answer');
    }
}
