<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerLoggedDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_logged_devices', function (Blueprint $table) {
            $table->foreignIdFor(App\Models\Customer::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_logged_devices', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }
}
