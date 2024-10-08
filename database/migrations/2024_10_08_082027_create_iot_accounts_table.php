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
        Schema::create('iot_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iot_id');
            $table->foreign('iot_id')
            ->references('id')
            ->on('iots')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->dateTime('expired_date')->nullable();
            $table->string('panel_url');
            $table->string('panel_username');
            $table->string('panel_password');
            $table->string('db_url');
            $table->string('db_name');
            $table->string('db_username');
            $table->string('db_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iot_accounts');
    }
};
