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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('paymentid');
            $table->unsignedInteger('customerid');
            $table->string('code')->nullable();
            $table->string('package');
            $table->string('quantity');
            $table->date('orderdate');
            $table->string('status');
            $table->foreign('customerid')->references('customerid')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
