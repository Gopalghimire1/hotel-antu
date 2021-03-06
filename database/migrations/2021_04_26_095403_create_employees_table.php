<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob');
            $table->integer('role')->default(2);
            $table->longText('address')->nullable();
            $table->enum('sex',['M','F','O'])->default('M');
            $table->string('picture')->nullable();
            $table->string('password');
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_card_image')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('vip')->default(0);
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
        Schema::dropIfExists('employees');
    }
}
