<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';
    protected $primaryKey = 'id';
    protected $fillable = ['exam'];
    public function question()
    {

        return $this->hasMany('Models\Question', 'id', 'id_question');
    }
}
