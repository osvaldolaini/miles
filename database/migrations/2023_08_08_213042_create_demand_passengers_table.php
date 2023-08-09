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
        Schema::create('demand_passengers', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->nullable();
            $table->string('name')->nullable();
            $table->foreignId('demand_id')
                ->constrained('demands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demand_passengers');
    }
};
