<?php
  
namespace App\Models;

use App\Models\Deposit_To_Bank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Account extends Model
{
    use HasFactory;
  
    public $timestamps=false;
    protected $fillable = 
    ['acc_title', 'acc_code', 'acc_category', 'acc_type' ];

    public function collection()
    {
        return $this->hasMany(Collection::class, 'account_title');
        
    }
      public function expense()
    {
        return $this->hasMany(Expenses::class, 'account_title');
    }
      public function deposit_to_bank()
    {
        return $this->hasMany(Deposit_To_Bank::class, 'account_title');
    }
 }