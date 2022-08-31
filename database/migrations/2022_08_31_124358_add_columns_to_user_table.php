<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //php artisan make:migration add_columns_to_user_table --table=users ( table columns ထက်ထည့်တဲ့ php artisan commend ပါ။ )

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role',['admin','editor','author'])->default('author');
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
            $table->dropColumn('role');
        });
    }
};
