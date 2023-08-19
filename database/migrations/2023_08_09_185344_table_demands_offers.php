<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableDemandsOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->foreignId('offer_id')
                ->nullable()
                ->constrained('offers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->foreignId('account_id')
                ->nullable()
                ->constrained('accounts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->dropForeign('demands_offer_id_foreign');
            $table->dropColumn('offer_id');
            $table->dropForeign('accounts_account_id_foreign');
            $table->dropColumn('account_id');
        });
    }
}
