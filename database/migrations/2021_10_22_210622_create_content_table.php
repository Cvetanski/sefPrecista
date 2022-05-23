<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('short_description');
            $table->string('image2');
            $table->longText('description');
            $table->string('slug');
            $table->string('publication_status')->default(1);

            $table->unsignedBigInteger('category_id');
            $table->index('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->index('sub_category_id');
            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('section_id')->nullable();
            $table->index('section_id');
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('cascade');

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
        Schema::dropIfExists('content');
    }
}
