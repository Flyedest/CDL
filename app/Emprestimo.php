<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimo';
    
    public $timestamps = false;
    
    protected $guarded = ['_token'];
    
    protected $primarykey = 'Id';
    
    
    
}
