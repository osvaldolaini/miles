<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf')->nullable();
            $table->string('avatar',100)->nullable();
            $table->string('username',100)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('bio',255)->nullable();
            $table->string('updated_by',50)->nullable()->after('updated_at');
            $table->string('created_by',50)->nullable()->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array('cpf','avatar','username','phone','bio','updated_by','created_by'));
        });
    }
}
