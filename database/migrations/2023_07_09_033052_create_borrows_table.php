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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('peminjaman');
            $table->string('pengembalian');
            $table->string('admin');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
