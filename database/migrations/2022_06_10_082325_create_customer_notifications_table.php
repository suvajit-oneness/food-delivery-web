<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Customer::class);
            $table->string('title', 200)->nullable()->default('');
            $table->mediumText('description')->nullable()->default('');
            $table->string('type', 100)->nullable()->default('order');
            $table->tinyInteger('is_read')->default(0)->comment('read by customer or not');
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
        Schema::dropIfExists('customer_notifications');
    }
}
