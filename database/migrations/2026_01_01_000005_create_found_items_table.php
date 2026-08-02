<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('found_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('finder_name', 100);
            $table->string('class_name', 50)->nullable();
            $table->string('phone_number', 20);
            $table->string('item_name', 150);
            $table->text('description');
            $table->string('photo', 255)->nullable();
            $table->date('found_date');
            $table->string('storage_location', 150)->nullable();
            $table->enum('status', ['Menunggu Pemilik', 'Diklaim', 'Dikembalikan'])->default('Menunggu Pemilik');
            $table->timestamps();

            $table->index(['status', 'category_id', 'location_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('found_items');
    }
};
