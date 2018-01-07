<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger("site_id");
            $table->string("title", 255);
            $table->text("body");
            $table->string("keyword");
            $table->string("city");
            $table->timestamps();
            $table->foreign("site_id")->references('id')->on("sites")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("data",function (Blueprint $table){
            $table->dropForeign("site_id");
        });
        Schema::dropIfExists('data');
    }
}
