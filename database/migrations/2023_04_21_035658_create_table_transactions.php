<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('bank_account')->nullable();
            $table->string('type_of_fund')->nullable();
            $table->enum('type', ['deposit', 'collection', 'expense','withdraw'])->nullable();
            $table->date('date')->nullable();
            $table->string('payer_payee')->nullable();
            $table->string('particulars')->nullable();
            $table->string('income_acc')->nullable();
            $table->string('or_no')->nullable();
            $table->string('dv_no')->nullable();
            $table->string('pb_no')->nullable();
            $table->string('rcd_no')->nullable();
            $table->string('check_no')->nullable();
            $table->string('deposit_slip_no')->nullable();
            $table->string('deposited_in')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
