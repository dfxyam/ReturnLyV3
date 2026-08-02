<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('found_item_id')->constrained('found_items')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('claimer_name', 100);
            $table->string('class_name', 50)->nullable();
            $table->string('phone_number', 20);
            $table->text('reason');
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');
            $table->timestamps();

            $table->index(['status', 'found_item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
