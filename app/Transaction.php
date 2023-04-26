<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
        protected $fillable = ['type_of_fund','bank_account','type','date','payer_payee','particulars','or_no','dv_no','pb_no','rcd_no','check_no','deposit_slip_no','deposited_in','debit','credit', 'amount'];
    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
