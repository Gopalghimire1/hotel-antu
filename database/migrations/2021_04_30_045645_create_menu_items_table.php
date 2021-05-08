<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->text('name');
            $table->text('desc')->nullable();
            $table->text('image')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('status')->nullable();
            $table->integer('room')->nullable();
            $table->unsignedBigInteger('menu_category_id')->nullable();
            $table->foreign("menu_category_id")->references('id')->on("menu_categories")->cascadeOnDelete();
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
        Schema::dropIfExists('menu_items');
    }
}
