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
        Schema::create('loans', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("cpf");
            $table->string("phone");
            $table->string("address");
            $table->timestamp("exit_date");
            $table->timestamp("delivery_date");
            $table->uuid("author_id");
            $table
                ->foreign("author_id")
                ->references("id")
                ->on("authors")
                ->onUpdate("CASCADE")
                ->onDelete("CASCADE");
            $table->uuid("book_id");
            $table
                ->foreign("book_id")
                ->references("id")
                ->on("books")
                ->onUpdate("CASCADE")
                ->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
