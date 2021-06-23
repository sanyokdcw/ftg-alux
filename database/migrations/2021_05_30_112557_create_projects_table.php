<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('image');
            $table->text('company_image');
            $table->string('deadline');
            $table->string('start_of_work');
            $table->string('price_rub');
            $table->string('price_uah');
            $table->string('price_kz');
            $table->text('object_name');
            $table->text('task');
            $table->text('solution');
            $table->text('result');
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
        Schema::dropIfExists('projects');
    }
}
