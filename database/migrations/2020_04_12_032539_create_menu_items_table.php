<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('position')->nullable();
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });

        DB::table('menu_items')->insert([
            'name' => 'اطلاعات',
            'icon' => 'info-circle',
            'link' => 'https://colorlib.com',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
