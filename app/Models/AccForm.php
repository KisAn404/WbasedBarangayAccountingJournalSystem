<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccForm extends Model
{
    use HasFactory;
       protected $fillable = [
       'form_name',	
'avail_forms',	
'avail_serialno_from',	
'avail_serialno_to'];
}
