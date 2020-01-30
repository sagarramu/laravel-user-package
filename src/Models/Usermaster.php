<?php

namespace Sagar\Usermaster\Models;

use Illuminate\Database\Eloquent\Model;

class Usermaster extends Model
{

    protected $fillable = [
        'username', 'email'
    ];
}
