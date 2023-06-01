<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'as_of', 'bank_acc', 'beg_bal'
    ];
}
