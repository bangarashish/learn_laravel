<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterpreterModel extends Model
{
    use HasFactory;

    protected $table = 'interpreters';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city_id',
        'state_id',
        'country_id',
        'dob',
        'gender',
        'subject',
        'description',
        'image',
    ];


}
