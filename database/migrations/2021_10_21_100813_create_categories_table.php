<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use Kalnoy\Nestedset\NestedSet;

    class CreateCategoriesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('description');
                $table->string('slug')->nullable();
                NestedSet::columns($table);
                $table->boolean('published')->default(true);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(): void
        {
            Schema::dropIfExists('categories');
        }
    }
