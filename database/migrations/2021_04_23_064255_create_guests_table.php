<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('id_number')->nullable();
            $table->date('id_issue_date')->nullable();
            $table->date('id_expire_date')->nullable();
            $table->string('id_issued_place')->nullable();
            $table->string('card_no')->nullable();
            $table->date('card_expire_date')->nullable();
            $table->string('ccv')->nullable();
            $table->date('check_in');
            $table->integer('adults')->default(0);
            $table->integer('child')->default(0);
            $table->boolean('status')->default(1);
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('guests');
    }
}
