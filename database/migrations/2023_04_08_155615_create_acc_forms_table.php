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
        Schema::create('acc_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_name');
            $table->integer('avail_forms');
            $table->integer('avail_serialno_from');
            $table->integer('avail_serialno_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acc_forms');
    }
};
