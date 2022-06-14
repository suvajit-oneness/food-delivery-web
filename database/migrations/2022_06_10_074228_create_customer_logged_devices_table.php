<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerLoggedDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_logged_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Customer::class);
            $table->string('device_type', 50)->default('android');
            $table->string('firebase_token', 250)->default('');
            $table->tinyInteger('is_expired')->default(0);
            $table->tinyInteger('is_loggedout')->default(0);
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
        Schema::dropIfExists('customer_logged_devices');
    }
}
