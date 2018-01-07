<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrossNotifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_notification', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("data_id");
            $table->boolean("status");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade")->index("user_id");
            $table->foreign("data_id")->references("id")->on("data")->onUpdate("cascade")->onDelete("cascade")->index("data_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("cross_notification", function (Blueprint $table) {
            $table->dropForeign(["data_id", "user_id"]);
        });
        Schema::dropIfExists('cross_notification');
    }
}
