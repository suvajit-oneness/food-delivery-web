<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('phone', 250)->unique();
            $table->string('alternate_phone', 250)->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_expired_at', $precision = 0)->nullable();
            $table->string('pan_no', 100)->nullable()->default('')->comment('document purpose');
            $table->string('aadhar_no', 100)->nullable()->default('')->comment('document purpose');
            $table->string('driving_license_no', 100)->nullable()->default('')->comment('document purpose');
            $table->string('highest_qualification', 200)->nullable()->default('')->comment('document purpose');
            $table->string('educational_certificate', 200)->nullable()->default('')->comment('document upload');
            $table->tinyInteger('is_approved')->default(0);
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
        Schema::dropIfExists('agents');
    }
}
