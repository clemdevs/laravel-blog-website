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
        Schema::create('nested_reply', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_reply_id');
            $table->unsignedBigInteger('parent_reply_id');
            $table->timestamps();

            $table->foreign('child_reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->foreign('parent_reply_id')->references('id')->on('replies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nested_reply');
    }
};
