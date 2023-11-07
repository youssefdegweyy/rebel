<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->string('code');
            $table->string('image')->nullable();
            $table->double('price');
            $table->integer('points_price')->nullable();
            $table->double('discount_price')->nullable();
            $table->text('description');
            $table->double('size_one_stock')->nullable();
            $table->double('size_two_stock')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
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
};
