<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    const TABLE = "tickets";

    protected $table = 'tickets';

    public $timestamps = false;

}
