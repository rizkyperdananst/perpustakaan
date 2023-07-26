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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->foreignId('category_book_id')->constrained('category_books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('slug');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('pengarang');
            $table->string('tahun');
            $table->string('lokasi');
            $table->string('stok');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
