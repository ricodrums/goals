<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->string('title', 20);
            $table->string('description', 64)->nullable();
            $table->bigInteger('goal');
            $table->bigInteger('saved')->default(0);
            $table->bigInteger('last')->default(0);
            $table->date('limit_day')->nullable();
            $table->bigInteger('daily_pay');
            $table->foreignId('user_id')->constrained('users'); //Foreign Key with Goals of an user
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
        Schema::dropIfExists('goals');
    }
}
