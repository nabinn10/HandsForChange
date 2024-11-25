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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            // foreign key from user table where role is requester
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // request type
            $table->string('request_type');
            // description of the request
            $table->text('description');
            // status of the request
            $table->string('status')->default('pending');
            // valid document
            $table->string('document');
        


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
