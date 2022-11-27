<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    //para professores
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //para alunos
    public function users(){
        return $this->belongsToMany('App\Models\User');

    }
}
