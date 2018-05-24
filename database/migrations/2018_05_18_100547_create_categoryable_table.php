<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryables', function (Blueprint $table) {

            $table->integer('category_id');//id категорий с таблицы категорий
            $table->integer('categoryable_id');//id поля таблицы связанной модели
            $table->string('categoryable_type');//связанная модель в котороц искать значений поля category_id

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categoryables');
    }
}
