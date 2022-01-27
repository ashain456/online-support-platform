<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    const TABLE = "users";

    protected $table = 'users';

    public $timestamps = false;

}
