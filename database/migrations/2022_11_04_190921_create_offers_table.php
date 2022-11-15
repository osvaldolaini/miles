<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->decimal('value', $precision = 10, $scale = 2)->nullable();
            $table->foreignId('demand_id')->constrained();
            // $table->foreignId('user_id')->constrained();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            /*Relacionamentos */
             $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
