<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('phnumber')->unique();
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->integer('num_children');
            $table->integer('upper_age');
            $table->integer('lower_age');
            $table->integer('price');
            $table->enum('gender',['f','m','other']);
            $table->enum('living_condition', ['live_in', 'back_forth']);
            $table->enum('weekend_break', ['yes', 'no']);
            $table->enum('chores', ['yes', 'no']);
            $table->string('facebook')->nullable();
            $table->string('whatsup')->nullable();
            $table->string('viber')->nullable();
            $table->string('telegram')->nullable();
            $table->mediumText('image')->nullable();
            $table->enum('job_status', ['public', 'private'])->default('private');
            $table->enum('approved',['yes','no'])->default('no');
            $table->enum('paymet_status', ['paid', 'notyet'])->default('notyet');
            $table->date('start_date');
            $table->string('description')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('job');
    }
}
