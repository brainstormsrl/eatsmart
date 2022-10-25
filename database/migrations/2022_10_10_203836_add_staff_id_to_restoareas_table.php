<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStaffIdToRestoareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restoareas', function (Blueprint $table) {
            $table->foreignIdFor(\App\User::class)->nullable()->after('restaurant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restoareas', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
