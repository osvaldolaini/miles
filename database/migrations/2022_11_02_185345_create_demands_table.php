<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->string('qtd',15)->nullable();
            $table->dateTime('end_date')->nullable();
            $table->decimal('value', $precision = 10, $scale = 2)->nullable();
            $table->decimal('value_max', $precision = 10, $scale = 2)->nullable();
            $table->decimal('miles', $precision = 10, $scale = 0)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
}
