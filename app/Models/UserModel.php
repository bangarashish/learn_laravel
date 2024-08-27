<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'id';

    
    use Sortable;
   // protected $fillable = [ 'name', 'email', 'phone' ];
	public $sortable = ['id', 'name', 'email', 'created_at', 'updated_at'];
}
