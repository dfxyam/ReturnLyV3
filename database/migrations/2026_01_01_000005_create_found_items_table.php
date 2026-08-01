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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();
            $table->string('item_name', 150);
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();
            $table->date('found_date');
            $table->string('contact_name', 100);
            $table->string('contact_phone', 20);
            $table->enum('status', ['found', 'claimed', 'returned'])->default('found');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['item_name', 'status', 'found_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('found_items');
    }
};
