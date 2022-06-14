<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('phone', 12)->unique();
            $table->string('alternate_phone', 12)->nullable();
            $table->integer('otp')->nullable() ;
            $table->dateTime('otp_expired_at', $precision = 0)->nullable();
            $table->string('gender', 10)->nullable()->default('male');
            $table->string('picture',200)->nullable();
            $table->string('wallet_no',200)->nullable();
            $table->string('wallet_bal',200)->nullable();
            $table->string('referral_code',200)->nullable();
            $table->string('device_type', 100)->nullable()->default('android'); 
            $table->string('firebase_token', 250)->nullable()->default('')->comment('firebase device token');           
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
        Schema::dropIfExists('customers');
    }
}
