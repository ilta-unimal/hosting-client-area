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
        Schema::create('iot_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iot_id');
            $table->foreign('iot_id')
            ->references('id')
            ->on('iots')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('payment_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iot_payments');
    }
};
