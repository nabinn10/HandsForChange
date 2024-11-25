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
        Schema::create('donars', function (Blueprint $table) {
            $table->id();
            // foreign key from users table where make column is donar
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // donatiopn type where type are  money, food, clothes and so on
            $table->string('donation_type');
            // amount
            $table->string('amount')->nullable();
            // status
            $table->string('status')->default('pending');
            // descriptuon
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donars');
    }
};
