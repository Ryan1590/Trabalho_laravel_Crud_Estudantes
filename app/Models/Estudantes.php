<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudantes extends Model
{
    protected $fillable = ['nome', 'cpf', 'nascimento'];

}
