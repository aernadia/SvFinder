<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stud extends Model
{
    //
    protected $fillable = [
        'stud_id', 'stu_email','pw', 'stud_name', 'prog_code'
      ];
}
