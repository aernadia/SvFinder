<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'staff_id', 'staff_name', 'prog_code'
      ];
}
