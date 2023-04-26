<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;


class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'collection',
        'expenses',
        'deposit',
    ];

    protected $dates = [
        'date',
    ];
}
