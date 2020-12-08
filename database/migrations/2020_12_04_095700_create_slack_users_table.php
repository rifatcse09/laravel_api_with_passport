<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlackUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slack_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_token');
            $table->string('team_id');
            $table->string('team_name');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('app_token');
            $table->string('app_access_token');
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
        Schema::dropIfExists('slack_users');
    }
}
