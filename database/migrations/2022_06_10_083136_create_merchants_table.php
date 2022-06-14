<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('phone', 250)->unique();
            $table->string('alternate_phone', 250)->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_expired_at', $precision = 0)->nullable();
            $table->tinyInteger('is_blocked')->default(0);
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
        Schema::dropIfExists('merchants');
    }
}
