<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image')->nullable();
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->string('article');
            $table->boolean('available');
            $table->string('existence');
            $table->integer('price_ru');
            $table->integer('price_kz');
            $table->integer('price_uah');
            $table->integer('sale');
            $table->text('description');
            $table->text('characteristics');
            $table->text('documentation');
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
        Schema::dropIfExists('products');
    }
}
