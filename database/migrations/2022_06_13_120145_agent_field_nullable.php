<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgentFieldNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('alternate_phone')->nullable()->change();
            $table->string('otp')->nullable()->change();
            $table->string('otp_expired_at')->nullable()->change();
            $table->string('pan_no')->nullable()->change();
            $table->string('aadhar_no')->nullable()->change();
            $table->string('driving_license_no')->nullable()->change();
            $table->string('highest_qualification')->nullable()->change();
            $table->string('educational_certificate')->nullable()->change();
            $table->string('firebase_token', 250)->nullable()->default('')->comment('firebase device token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
        });
    }
}
