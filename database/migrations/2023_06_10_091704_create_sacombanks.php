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
        Schema::create('sacombanks', function (Blueprint $table) {
            $table->increments('sacombankid');
            $table->string('card_number');
            $table->string('subject_name');
            $table->date('expiration_date');
            $table->string('cvv_cvc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sacombanks');
    }
};
