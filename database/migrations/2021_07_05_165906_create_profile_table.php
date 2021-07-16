<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id('profile_id');
            $table->unsignedBigInteger('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('numbers')->unique();
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->enum('gender',['f','m','other']);
            $table->date('birth_date');
            $table->integer('experience');
            $table->integer('price');
            $table->enum('living_condition', ['live_in', 'back_forth']);
            $table->enum('weekend_break', ['yes', 'no']);
            $table->enum('chores', ['yes', 'no'])->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsup')->nullable();
            $table->string('viber')->nullable();
            $table->string('telegram')->nullable();
            $table->enum('profile_status', ['public', 'private'])->default('private');
            $table->enum('approved',['yes','no'])->default('no');
            $table->enum('paymet_status', ['paid', 'notyet'])->default('notyet');
            $table->mediumText('image')->nullable();
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
        Schema::dropIfExists('profile');
    }
}
