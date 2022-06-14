<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerFiledsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('alternate_phone')->nullable()->change();
            $table->string('otp')->nullable()->change();
            $table->string('otp_expired_at')->nullable()->change();
            $table->string('dob')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('picture')->nullable()->change();
            $table->string('wallet_no')->nullable()->change();
            $table->string('wallet_bal')->nullable()->change();
            $table->string('referral_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
