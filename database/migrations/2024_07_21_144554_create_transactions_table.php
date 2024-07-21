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
            $table->string('member_id')->nullable();
            $table->unsignedBigInteger('vehicle_type_id');
            $table->double('total_price');
            
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade')->onUpdate('cascade');
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
