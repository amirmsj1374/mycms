<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();
            $table->text('address')->nullable();
            $table->text('telephones')->nullable();
            $table->text('emails')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->boolean('visible')->default(1);
            $table->timestamps();
        });

        DB::table('footers')->insert([
            "title" => "عنوان فوتر",
            "description_1" => " متن فوترمتن فوترمتن فوترمتن فوترمتن فوترمتن فوترمتن فوترمتن فوتر",
            "description_2" => "متن فوتر متن فوترمتن فوترمتن فوترمتن فوترمتن فوترمتن فوترمتن فوتر",
            "address" => "آدرس آدرس آدرس آدرس آدرس آدرس آدرس آدرس آدرس آدرس آدرس ",
            "telephones" => "0123145145,0213464646",
            "emails" => "a@cdd.com,b@jljalj.com",
            "facebook" => "google.com",
            "twitter" => "google.com",
            "google" => "google.com",
            "linkedin" => "google.com",
            "instagram" => "google.com",
            "telegram" => "google.com",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
}
