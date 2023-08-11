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
        Schema::create('rating_users', function (Blueprint $table) {
            $table->id();
            $table->tinyText('text')->nullable();
            $table->integer('rate')->nullable();
            $table->foreignId('evaluted')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('offer_id')
                ->nullable()
                ->constrained('offers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('demand_id')
                ->nullable()
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
        Schema::dropIfExists('rating_users');
    }
};
