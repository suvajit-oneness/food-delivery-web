<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Restaurant::class);
            $table->string('added_by', 100)->nullable()->default('admin')->comment('admin or merchant');
            $table->string('name', 100)->nullable()->default('');
            $table->longText('description')->nullable()->default('');
            $table->string('image', 200)->nullable()->default('');
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('dishes');
    }
}
