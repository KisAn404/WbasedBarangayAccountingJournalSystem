<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $fillable = [
        'src_of_fund', 'bank_account', 
        'amount'];

      public function expense()
    {
        return $this->hasMany(Expenses::class, 'bank_account');
    }
      public function deposit_to_bank()
    {
        return $this->hasMany(Deposit_To_Bank::class, 'bank_account');
    }
}
