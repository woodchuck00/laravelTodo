<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Todo extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'to_dos';
    
    protected $fillable = [ 'title', 'completed' ];
}
