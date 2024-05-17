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
        Schema::create('scheduled_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->integer("amount");
            $table->timestamps();
            $table->foreignId("transaction_id")->nullable()->constrained()->onDelete("cascade");
            $table->boolean("daily")->default(false);
            $table->boolean("monthly")->default(false);
            $table->date("scheduled_for")->nullable();
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_transactions');
    }
};
