<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = array(
        'id',
        'name',
        'email',
        'phone',
        'status',
    );
    public $timestamps;
}
